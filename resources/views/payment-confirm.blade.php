@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-100">

    <div class="bg-white p-10 rounded-3xl shadow-xl max-w-md w-full">

        <h1 class="text-3xl font-black text-slate-800 mb-4 text-center">
            Konfirmasi Pembayaran
        </h1>

        <p class="text-slate-500 mb-6 text-center">
            Upload bukti pembayaran Anda untuk menyelesaikan transaksi.
        </p>

        <form action="{{ route('payment.confirm.process', $transaction) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="proof_of_payment" class="block text-sm font-medium text-slate-700">
                    Bukti Pembayaran
                </label>
                <input type="file" name="proof_of_payment" id="proof_of_payment"
                    class="mt-1 block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-50 file:text-indigo-700
                    hover:file:bg-indigo-100"
                    required>
                @error('proof_of_payment')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-2xl font-bold transition">
                Konfirmasi & Lihat Tiket
            </button>

        </form>

    </div>

</div>
@endsection
