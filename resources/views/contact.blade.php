@extends('layouts.app')

@section('title', 'Kontak - AmikomEventHub')

@section('content')

    <div class="bg-slate-100 min-h-screen py-12 px-6">

        <div class="max-w-2xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-10">

                <h1 class="text-3xl font-semibold text-slate-800 mb-2">
                    Hubungi Kami
                </h1>

                <p class="text-slate-500 text-sm max-w-sm mx-auto leading-relaxed">
                    Ada pertanyaan atau butuh bantuan terkait event? Kami siap membantu kamu.
                </p>

            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

                <!-- Card Header -->
                <div class="bg-indigo-950 px-7 py-5">
                    <span class="block text-indigo-300 text-xs font-medium tracking-widest uppercase mb-1">
                        AmikomEventHub
                    </span>
                    <p class="text-indigo-500 text-sm">
                        Universitas Amikom Yogyakarta — Tim Support
                    </p>
                </div>

                <div class="grid md:grid-cols-2">

                    <!-- Info -->
                    <div class="p-7 space-y-5 border-b md:border-b-0 md:border-r border-slate-100">

                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0">
                                📧
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">Email</p>
                                <p class="text-xs text-slate-500 mt-0.5">bagoeslupras@students.amikom.ac.id</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-lg bg-green-100 text-green-700 flex items-center justify-center flex-shrink-0">
                                📱
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">WhatsApp</p>
                                <p class="text-xs text-slate-500 mt-0.5">+62 8138989899</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center flex-shrink-0">
                                📍
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-800">Lokasi</p>
                                <p class="text-xs text-slate-500 mt-0.5">Universitas Amikom Yogyakarta</p>
                            </div>
                        </div>

                    </div>

                    <!-- Form -->
                    <div class="p-7 space-y-3">

                        <h2 class="text-base font-medium text-slate-800 mb-1">
                            Kirim Pesan
                        </h2>

                        <input type="text" placeholder="Nama Anda"
                            class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg bg-slate-50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition">

                        <input type="email" placeholder="Email Anda"
                            class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg bg-slate-50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition">

                        <textarea rows="4" placeholder="Tulis pesan..."
                            class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg bg-slate-50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition resize-none"></textarea>

                        <button
                            class="w-full py-2.5 bg-indigo-950 hover:bg-indigo-900 text-indigo-200 text-sm font-medium rounded-lg transition">
                            Kirim Pesan
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection