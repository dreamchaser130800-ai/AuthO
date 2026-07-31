<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;

use Midtrans\Config;
use Midtrans\Snap;

class EventController extends Controller
{
    public function show(Event $event)
    {
        $event->load('category');

        return view('event-detail', compact('event'));
    }

    public function checkout(Event $event)
    {
        return view('checkout', compact('event'));
    }

    public function processCheckout(Request $request, Event $event)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email',
            'buyer_phone' => 'required|string|max:20',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Cek stok
        if ($event->stock <= 0) {
            return back()->with('error', 'Maaf, tiket event ini sudah habis.');
        }

        $serviceFee = 5000;
        $totalPrice = $event->price + $serviceFee;

        // Jika bukan production, gunakan harga dummy
        if (config('midtrans.is_production') == false) {
            $totalPrice = 10000;
        }

        // Simpan transaksi
        $transaction = Transaction::create([
            'event_id' => $event->id,
            'order_id' => 'INV-' . now()->format('YmdHis') . '-' . rand(100, 999),
            'customer_name' => $request->buyer_name,
            'customer_email' => $request->buyer_email,
            'customer_phone' => $request->buyer_phone,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'snap_token' => null,
        ]);

        // Parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->order_id,
                'gross_amount' => $transaction->total_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->customer_name,
                'email' => $transaction->customer_email,
                'phone' => $transaction->customer_phone,
            ],
        ];

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Simpan Snap Token
        $transaction->update([
            'snap_token' => $snapToken,
        ]);

        // Kurangi stok
        $event->decrement('stock');

        // Redirect ke halaman payment
        return redirect()->route('payment', $transaction);
    }

    public function payment(Transaction $transaction)
    {
        return view('payment', compact('transaction'));
    }

    public function ticket(Transaction $transaction)
    {
        $transaction->load('event');

        return view('ticket', compact('transaction'));
    }

    public function confirmPayment(Transaction $transaction)
    {
        return view('payment-confirm', compact('transaction'));
    }

    public function processConfirmPayment(Request $request, Transaction $transaction)
    {
        $request->validate([
            'proof_of_payment' => 'required|image|max:2048',
        ]);

        $path = $request->file('proof_of_payment')->store('public/proofs');

        $transaction->update([
            'proof_of_payment' => $path,
            'status' => 'paid',
        ]);

        return redirect()->route('ticket', $transaction)->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}