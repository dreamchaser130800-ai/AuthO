@extends('layouts.app')

@section('title', 'Pembayaran Berhasil')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-100">

    <div class="bg-white p-10 rounded-3xl shadow-xl max-w-lg w-full text-center">

        <div class="w-24 h-24 bg-green-500 rounded-full mx-auto flex items-center justify-center mb-6">
            <span class="text-white text-5xl">✓</span>
        </div>

        <h1 class="text-4xl font-black text-green-600 mb-3">
            Pembayaran Berhasil!
        </h1>

        <p class="text-slate-600 mb-2">
            Terima kasih telah membeli tiket di
            <strong>AmikomEventHub</strong>.
        </p>

        <p class="text-slate-500 mb-8">
            E-Ticket telah dikirim ke
            <strong>{{ $transaction->customer_email }}</strong>
        </p>

        <a href="{{ route('ticket', $transaction) }}"
            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold transition">
            🎫 Lihat E-Ticket
        </a>

    </div>

</div>

@endsection