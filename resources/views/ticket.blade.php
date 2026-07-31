@extends('layouts.app')

@section('title', 'E-Ticket - AmikomEventHub')

@section('styles')
<style>
    body {
        background: linear-gradient(to bottom right, #eef2ff, #ffffff, #e0e7ff);
    }

    main {
        background: transparent;
    }
</style>
@endsection

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Berhasil!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('info'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Info!</strong>
        <span class="block sm:inline">{{ session('info') }}</span>
    </div>
@endif

<div class="min-h-screen flex items-center justify-center px-6 py-16 relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-300 opacity-20 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-300 opacity-20 blur-3xl rounded-full"></div>

    <div class="max-w-md w-full relative z-10">

        <!-- Status Banner -->
        <div class="text-center mb-10">

            <div
                class="w-24 h-24
                @if($transaction->status == 'paid')
                    bg-green-600
                @elseif($transaction->status == 'pending')
                    bg-yellow-500
                @else
                    bg-red-600
                @endif
                rounded-full flex items-center justify-center mx-auto mb-5 shadow-2xl border-4 border-white">

                @if($transaction->status == 'paid')

                    <!-- Success -->
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="3"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                @elseif($transaction->status == 'pending')

                    <!-- Clock -->
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4l3 3"/>
                        <circle cx="12" cy="12" r="9" stroke-width="2"/>
                    </svg>

                @else

                    <!-- Failed -->
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="3"
                              d="M6 6l12 12M18 6L6 18"/>
                    </svg>

                @endif

            </div>

            @if($transaction->status == 'paid')

                <h1 class="text-4xl font-black text-green-600">
                    Pembayaran Berhasil!
                </h1>

                <p class="text-slate-500 mt-3">
                    E-ticket Anda telah berhasil diterbitkan.
                </p>

            @elseif($transaction->status == 'pending')

                <h1 class="text-4xl font-black text-yellow-500">
                    Menunggu Pembayaran
                </h1>

                <p class="text-slate-500 mt-3">
                    Silakan selesaikan pembayaran untuk mengaktifkan tiket.
                </p>

            @else

                <h1 class="text-4xl font-black text-red-600">
                    Pembayaran Gagal
                </h1>

                <p class="text-slate-500 mt-3">
                    Pembayaran tidak berhasil diproses.
                </p>

            @endif

        </div>

        <!-- Ticket -->
        <div
            class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl shadow-slate-300/70 border border-slate-200 relative">

            <!-- Header -->
            <div
                class="bg-gradient-to-r from-indigo-600 to-slate-900 text-white p-8 text-center relative overflow-hidden">

                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>

                <p class="text-indigo-200 font-bold uppercase tracking-[0.3em] text-xs mb-3">
                    Official E-Ticket
                </p>

                <h2 class="text-3xl font-black leading-tight">
                    {{ $transaction->event->title }}
                </h2>

                <p class="text-indigo-100 mt-2">
                    {{ \Illuminate\Support\Str::limit($transaction->event->description, 60) }}
                </p>

            </div>

        <!-- Ticket -->
        <div
            class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl shadow-slate-300/70 border border-slate-200 relative">

            <!-- Header -->
            <div
                class="bg-gradient-to-r from-indigo-600 to-slate-900 text-white p-8 text-center relative overflow-hidden">

                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>

                <p class="text-indigo-200 font-bold uppercase tracking-[0.3em] text-xs mb-3">
                    Official E-Ticket
                </p>

                <h2 class="text-3xl font-black leading-tight">
                    {{ $transaction->event->title }}
                </h2>

                <p class="text-indigo-100 mt-2">
                    {{ \Illuminate\Support\Str::limit($transaction->event->description, 60) }}
                </p>

            </div>

         <!-- Ticket Body -->
<div class="p-8 space-y-8">

    <!-- Information -->
    <div class="grid grid-cols-2 gap-6">

        <!-- Nama Pembeli -->
        <div class="bg-slate-50 p-4 rounded-2xl">
            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                Nama Pembeli
            </p>

            <p class="font-black text-slate-800">
                {{ $transaction->customer_name }}
            </p>
        </div>

        <!-- Tanggal -->
        <div class="bg-slate-50 p-4 rounded-2xl">
            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                Tanggal
            </p>

            <p class="font-black text-slate-800">
                {{ $transaction->event->date->format('d M Y') }}
            </p>
        </div>

        <!-- Order ID -->
        <div class="bg-slate-50 p-4 rounded-2xl">
            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                Order ID
            </p>

            <p class="font-black text-slate-800 text-sm">
                {{ $transaction->order_id }}
            </p>
        </div>

        <!-- Lokasi -->
        <div class="bg-slate-50 p-4 rounded-2xl">
            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                Lokasi
            </p>

            <p class="font-black text-slate-800">
                {{ $transaction->event->location }}
            </p>
        </div>

        <!-- Total -->
        <div class="bg-slate-50 p-4 rounded-2xl">
            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                Total Bayar
            </p>

            <p class="font-black text-indigo-600">
                Rp {{ number_format($transaction->total_price,0,',','.') }}
            </p>
        </div>

        <!-- Status -->
        <div class="bg-slate-50 p-4 rounded-2xl">
            <p class="text-slate-400 text-xs font-black uppercase mb-1">
                Status
            </p>

            <p class="font-black
                @if($transaction->status=='paid')
                    text-green-600
                @elseif($transaction->status=='pending')
                    text-yellow-500
                @else
                    text-red-600
                @endif">

                {{ strtoupper($transaction->status) }}

            </p>
        </div>

    </div>

    {{-- QR hanya muncul jika sudah PAID --}}
    @if($transaction->status == 'paid')

    <div class="bg-gradient-to-br from-slate-100 to-indigo-50 p-8 rounded-[2rem] flex flex-col items-center border border-slate-200">

        <p class="text-slate-500 text-xs font-black uppercase tracking-widest mb-5">
            Scan QR untuk Check-in
        </p>

        <div class="w-52 h-52 bg-white p-4 rounded-3xl shadow-inner flex items-center justify-center border border-slate-200">

            {{-- Nanti kita ganti dengan QR Generator --}}
            <div class="w-full h-full border-4 border-slate-900 flex flex-wrap p-1">

                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                <div class="w-1/4 h-1/4 bg-white"></div>
                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                <div class="w-1/4 h-1/4 bg-white"></div>

                <div class="w-1/4 h-1/4 bg-white"></div>
                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                <div class="w-1/4 h-1/4 bg-white"></div>
                <div class="w-1/4 h-1/4 bg-slate-900"></div>

                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                <div class="w-1/4 h-1/4 bg-white"></div>
                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                <div class="w-1/4 h-1/4 bg-white"></div>

                <div class="w-1/4 h-1/4 bg-white"></div>
                <div class="w-1/4 h-1/4 bg-slate-900"></div>
                <div class="w-1/4 h-1/4 bg-white"></div>
                <div class="w-1/4 h-1/4 bg-slate-900"></div>

            </div>

        </div>

        <p class="mt-5 font-mono font-black text-slate-800 text-lg">
            {{ $transaction->order_id }}
        </p>

    </div>

    @else

    <div class="bg-yellow-50 border border-yellow-300 rounded-2xl p-6 text-center">

        <h3 class="text-xl font-black text-yellow-700 mb-2">
            Tiket Belum Aktif
        </h3>

        <p class="text-slate-600">
            QR Code akan tersedia setelah pembayaran berhasil dikonfirmasi.
        </p>

    </div>

    @endif

</div>

<!-- Footer -->
<div class="px-8 pb-8">

    @if($transaction->status == 'paid')

    <button onclick="window.print()"
        class="w-full py-5 bg-slate-900 hover:bg-indigo-700 text-white rounded-2xl font-black text-lg shadow-xl transition-all duration-300 hover:scale-[1.02]">
        Cetak / Simpan PDF
    </button>

    @else

    <a href="{{ route('payment.confirm', $transaction) }}"
        class="block w-full text-center py-5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-black text-lg transition">
        Konfirmasi Pembayaran
    </a>

    @endif

    <a href="{{ route('home') }}"
        class="block text-center mt-5 text-slate-500 font-bold hover:text-indigo-600 transition">
        Kembali ke Beranda
    </a>

</div>

</div>

</div>
</div>
@endsection