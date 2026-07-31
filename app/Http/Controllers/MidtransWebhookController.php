<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;
        $signatureKey = $request->signature_key;

        $serverKey = config('midtrans.server_key');

        // Validasi Signature Key
        $hash = hash(
            'sha512',
            $orderId .
            $statusCode .
            $grossAmount .
            $serverKey
        );

        if ($hash != $signatureKey) {
            return response()->json([
                'message' => 'Invalid Signature'
            ], 403);
        }

        // Cari transaksi
        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaction Not Found'
            ], 404);
        }

        // Update status transaksi
        if ($request->transaction_status == 'settlement') {

            $transaction->update([
                'status' => 'paid'
            ]);

        } elseif ($request->transaction_status == 'pending') {

            $transaction->update([
                'status' => 'pending'
            ]);

        } elseif (
            $request->transaction_status == 'expire' ||
            $request->transaction_status == 'cancel'
        ) {

            $transaction->update([
                'status' => 'failed'
            ]);

        }

        return response()->json([
            'message' => 'Callback Success'
        ]);
    }
}