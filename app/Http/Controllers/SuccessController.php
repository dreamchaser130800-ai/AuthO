<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;

class SuccessController extends Controller
{
    public function index(Transaction $transaction)
    {
        // Load relasi event
        $transaction->load('event');

        // Jika belum dibayar, kembali ke halaman pembayaran
        if ($transaction->status != 'paid') {
            return redirect()->route('payment', $transaction);
        }

        // Kirim email e-ticket
        Mail::to($transaction->customer_email)
            ->send(new TicketMail($transaction));

        return view('success', compact('transaction'));
    }

    public function check(Transaction $transaction)
    {
        if ($transaction->status == 'paid') {
            return redirect()->route('ticket', $transaction)->with('success', 'Pembayaran berhasil!');
        }

        return redirect()->route('ticket', $transaction)->with('info', 'Status pembayaran masih tertunda.');
    }
}