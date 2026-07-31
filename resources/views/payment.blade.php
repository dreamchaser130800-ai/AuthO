@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-100">

    <div class="bg-white p-10 rounded-3xl shadow-xl max-w-md w-full text-center">

        <h1 class="text-3xl font-black text-slate-800 mb-4">
            Menunggu Pembayaran
        </h1>

        <p class="text-slate-500 mb-6">
            Klik tombol di bawah untuk melanjutkan pembayaran.
        </p>

        <button
            id="pay-button"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-2xl font-bold transition">
            Bayar Sekarang
        </button>

    </div>

</div>
@endsection

@section('scripts')

<!-- Midtrans Snap JS -->
<script
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>

document.getElementById('pay-button').addEventListener('click', function () {

    snap.pay('{{ $transaction->snap_token }}', {

        // Pembayaran berhasil
        onSuccess: function(result) {
            window.location.href = "{{ route('success', $transaction) }}";
        },

        // Pembayaran masih menunggu
        onPending: function(result) {
            window.location.href = "{{ route('ticket', $transaction) }}";
        },

        // Pembayaran gagal
        onError: function(result) {
            alert("Pembayaran gagal.");
        },

        // User menutup popup
        onClose: function() {
            alert("Kamu menutup popup pembayaran.");
        }

    });

});

</script>

@endsection