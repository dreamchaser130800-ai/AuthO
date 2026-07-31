@extends('layouts.app')

@php
    $kontakUrl = \Illuminate\Support\Facades\Route::has('kontak')
        ? route('kontak')
        : (\Illuminate\Support\Facades\Route::has('contact')
            ? route('contact')
            : url('/kontak'));
@endphp

@section('title', 'Bantuan - AmikomEventHub')

@section('content')

    <div class="min-h-screen overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-fuchsia-50 text-slate-900">

        <!-- Hero Section -->
        <section class="relative max-w-7xl mx-auto px-6 pt-16 pb-12">
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-300 rounded-full blur-3xl opacity-30"></div>
            <div class="absolute top-20 -right-32 w-96 h-96 bg-fuchsia-300 rounded-full blur-3xl opacity-25"></div>

            <div class="relative text-center max-w-4xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-xl border border-indigo-100 rounded-full shadow-sm mb-6">
                    <span class="w-2 h-2 bg-indigo-600 rounded-full"></span>
                    <span class="text-sm font-black uppercase tracking-wider text-indigo-700">
                        Help Center
                    </span>
                </div>

                <h1 class="text-5xl md:text-6xl font-black leading-tight tracking-tight text-slate-950 mb-5">
                    Pusat Bantuan
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-fuchsia-600">
                        AmikomEventHub
                    </span>
                </h1>

                <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto leading-relaxed">
                    Temukan jawaban seputar pendaftaran event, tiket, pembayaran, akun, dan bantuan lainnya.
                </p>

                <div
                    class="mt-10 bg-white/90 backdrop-blur-xl border border-white rounded-[2rem] shadow-2xl shadow-indigo-100/70 p-4 max-w-3xl mx-auto">
                    <div class="grid md:grid-cols-3 gap-4">
                        <a href="#faq"
                            class="group p-5 rounded-3xl bg-indigo-50 hover:bg-indigo-600 transition-all duration-300">
                            <div
                                class="w-12 h-12 mx-auto mb-3 bg-white rounded-2xl flex items-center justify-center text-indigo-600 font-black shadow-sm group-hover:scale-110 transition">
                                ?
                            </div>
                            <p class="font-black text-slate-800 group-hover:text-white transition">
                                FAQ
                            </p>
                            <p class="text-sm text-slate-500 group-hover:text-indigo-100 transition mt-1">
                                Pertanyaan umum
                            </p>
                        </a>

                        <a href="#panduan"
                            class="group p-5 rounded-3xl bg-fuchsia-50 hover:bg-fuchsia-600 transition-all duration-300">
                            <div
                                class="w-12 h-12 mx-auto mb-3 bg-white rounded-2xl flex items-center justify-center text-fuchsia-600 font-black shadow-sm group-hover:scale-110 transition">
                                ✓
                            </div>
                            <p class="font-black text-slate-800 group-hover:text-white transition">
                                Panduan
                            </p>
                            <p class="text-sm text-slate-500 group-hover:text-fuchsia-100 transition mt-1">
                                Cara daftar event
                            </p>
                        </a>

                        <a href="#kontak"
                            class="group p-5 rounded-3xl bg-emerald-50 hover:bg-emerald-600 transition-all duration-300">
                            <div
                                class="w-12 h-12 mx-auto mb-3 bg-white rounded-2xl flex items-center justify-center text-emerald-600 font-black shadow-sm group-hover:scale-110 transition">
                                ☎
                            </div>
                            <p class="font-black text-slate-800 group-hover:text-white transition">
                                Kontak
                            </p>
                            <p class="text-sm text-slate-500 group-hover:text-emerald-100 transition mt-1">
                                Hubungi admin
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Help Cards -->
        <section class="relative max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="group bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7 hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-2xl mb-5 group-hover:bg-indigo-600 group-hover:text-white transition">
                        1
                    </div>

                    <h2 class="text-2xl font-black text-slate-900 mb-3">
                        Pendaftaran Event
                    </h2>

                    <p class="text-slate-500 leading-relaxed">
                        Pelajari cara memilih event, membuka detail acara, dan melakukan pendaftaran dengan benar.
                    </p>
                </div>

                <div
                    class="group bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7 hover:-translate-y-2 hover:shadow-2xl hover:shadow-fuchsia-100 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-fuchsia-100 text-fuchsia-600 rounded-2xl flex items-center justify-center font-black text-2xl mb-5 group-hover:bg-fuchsia-600 group-hover:text-white transition">
                        2
                    </div>

                    <h2 class="text-2xl font-black text-slate-900 mb-3">
                        Tiket & Pembayaran
                    </h2>

                    <p class="text-slate-500 leading-relaxed">
                        Ketahui informasi seputar event gratis, event berbayar, dan status pendaftaran setelah pembayaran.
                    </p>
                </div>

                <div
                    class="group bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7 hover:-translate-y-2 hover:shadow-2xl hover:shadow-emerald-100 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center font-black text-2xl mb-5 group-hover:bg-emerald-600 group-hover:text-white transition">
                        3
                    </div>

                    <h2 class="text-2xl font-black text-slate-900 mb-3">
                        Bantuan Admin
                    </h2>

                    <p class="text-slate-500 leading-relaxed">
                        Jika masih bingung, pengguna dapat menghubungi admin untuk mendapatkan bantuan lebih lanjut.
                    </p>
                </div>

            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="relative max-w-7xl mx-auto px-6 py-16">
            <div
                class="absolute inset-x-0 top-20 bottom-20 -z-10 bg-gradient-to-b from-white/70 via-indigo-50/80 to-white/70 rounded-[3rem]">
            </div>

            <div class="text-center mb-12">
                <span
                    class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-4">
                    Pertanyaan Umum
                </span>

                <h2 class="text-4xl md:text-5xl font-black text-slate-950 mb-4">
                    Yang Sering Ditanyakan
                </h2>

                <p class="text-slate-500 max-w-2xl mx-auto leading-relaxed">
                    Beberapa informasi penting yang biasanya dicari pengguna saat menggunakan AmikomEventHub.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-indigo-600 group-hover:text-white transition">
                            ?
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Website ini untuk apasih?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Website ini dirancang untuk menampilkan berbagai event menarik serta mempermudah pengguna dalam melakukan pendaftaran acara.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-emerald-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-emerald-600 group-hover:text-white transition">
                            ✓
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Cara daftar event?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Masuk ke halaman katalog, pilih event yang tersedia, buka detail event, lalu lakukan pendaftaran sesuai petunjuk yang tersedia.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-fuchsia-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-fuchsia-100 text-fuchsia-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-fuchsia-600 group-hover:text-white transition">
                            !
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Apakah event berbayar?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Beberapa event tersedia secara gratis, sedangkan event premium dapat memerlukan biaya pendaftaran sesuai informasi pada detail event.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-blue-600 group-hover:text-white transition">
                            i
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Di mana melihat detail event?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Detail event dapat dilihat dengan membuka halaman katalog, lalu klik tombol detail pada event yang ingin kamu ikuti.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-orange-600 group-hover:text-white transition">
                            +
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Bisa ikut lebih dari satu event?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Bisa, selama event tersebut masih tersedia dan kamu mengikuti ketentuan pendaftaran dari masing-masing acara.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-rose-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-rose-100 text-rose-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-rose-600 group-hover:text-white transition">
                            ✎
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Kalau data salah bagaimana?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Jika terjadi kesalahan data saat pendaftaran, segera hubungi admin agar data dapat dicek dan dibantu sesuai kebutuhan.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-cyan-600 group-hover:text-white transition">
                            🎟
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Apakah tiket langsung aktif?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Tiket atau status pendaftaran akan mengikuti mekanisme dari event yang dipilih. Pastikan membaca detail event sebelum mendaftar.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-violet-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-violet-100 text-violet-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-violet-600 group-hover:text-white transition">
                            ★
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Apakah ada sertifikat?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Sertifikat bergantung pada kebijakan masing-masing event. Jika tersedia, informasi biasanya akan dicantumkan pada detail acara.
                    </p>
                </div>

                <div
                    class="group bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 p-7 border border-slate-200 hover:-translate-y-2 hover:shadow-2xl hover:shadow-red-100 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div
                            class="w-12 h-12 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center font-black text-xl group-hover:bg-red-600 group-hover:text-white transition">
                            ☎
                        </div>

                        <h3 class="text-xl font-black text-slate-900">
                            Butuh bantuan lebih lanjut?
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed">
                        Hubungi admin melalui halaman kontak untuk mendapatkan bantuan lebih lanjut terkait event, pendaftaran, atau pembayaran.
                    </p>
                </div>

            </div>
        </section>

        <!-- Guide Section -->
        <section id="panduan" class="relative max-w-7xl mx-auto px-6 py-16">
            <div class="grid lg:grid-cols-2 gap-10 items-center">

                <div>
                    <span
                        class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-4">
                        Panduan Singkat
                    </span>

                    <h2 class="text-4xl md:text-5xl font-black text-slate-950 mb-5">
                        Cara Mengikuti Event
                    </h2>

                    <p class="text-slate-500 text-lg leading-relaxed mb-8">
                        Ikuti langkah sederhana berikut agar proses pendaftaran event berjalan lancar.
                    </p>

                    <a href="{{ route('katalog') }}"
                        class="inline-flex items-center justify-center gap-2 px-7 py-4 bg-slate-950 text-white rounded-2xl font-black shadow-xl shadow-slate-300/70 hover:bg-indigo-700 hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                        Buka Katalog Event
                        <span>→</span>
                    </a>
                </div>

                <div class="space-y-5">

                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 flex gap-5 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black">
                            01
                        </div>

                        <div>
                            <h3 class="text-xl font-black text-slate-900 mb-1">
                                Pilih Event
                            </h3>
                            <p class="text-slate-500 leading-relaxed">
                                Buka katalog dan cari event yang sesuai dengan minat atau kebutuhanmu.
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 flex gap-5 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-fuchsia-600 text-white rounded-2xl flex items-center justify-center font-black">
                            02
                        </div>

                        <div>
                            <h3 class="text-xl font-black text-slate-900 mb-1">
                                Baca Detail Acara
                            </h3>
                            <p class="text-slate-500 leading-relaxed">
                                Perhatikan tanggal, harga, deskripsi, dan ketentuan sebelum melakukan pendaftaran.
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 flex gap-5 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-emerald-600 text-white rounded-2xl flex items-center justify-center font-black">
                            03
                        </div>

                        <div>
                            <h3 class="text-xl font-black text-slate-900 mb-1">
                                Lakukan Pendaftaran
                            </h3>
                            <p class="text-slate-500 leading-relaxed">
                                Ikuti instruksi pendaftaran yang tersedia pada halaman event.
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 flex gap-5 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center font-black">
                            04
                        </div>

                        <div>
                            <h3 class="text-xl font-black text-slate-900 mb-1">
                                Simpan Informasi Event
                            </h3>
                            <p class="text-slate-500 leading-relaxed">
                                Catat jadwal event agar tidak terlewat saat acara berlangsung.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Tips Section -->
        <section class="relative max-w-7xl mx-auto px-6 py-16">
            <div class="text-center mb-12">
                <span
                    class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-4">
                    Tips Pengguna
                </span>

                <h2 class="text-4xl md:text-5xl font-black text-slate-950 mb-4">
                    Tips Sebelum Mendaftar
                </h2>

                <p class="text-slate-500 max-w-2xl mx-auto leading-relaxed">
                    Supaya pengalaman mengikuti event lebih nyaman, perhatikan beberapa hal berikut.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-300">
                    <div class="text-4xl mb-4">📅</div>
                    <h3 class="font-black text-xl text-slate-900 mb-2">
                        Cek Jadwal
                    </h3>
                    <p class="text-slate-500 leading-relaxed">
                        Pastikan tanggal dan jam event sesuai dengan waktu luangmu.
                    </p>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 hover:-translate-y-2 hover:shadow-2xl hover:shadow-fuchsia-100 transition-all duration-300">
                    <div class="text-4xl mb-4">💳</div>
                    <h3 class="font-black text-xl text-slate-900 mb-2">
                        Cek Biaya
                    </h3>
                    <p class="text-slate-500 leading-relaxed">
                        Perhatikan apakah event gratis atau memiliki biaya pendaftaran.
                    </p>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 hover:-translate-y-2 hover:shadow-2xl hover:shadow-emerald-100 transition-all duration-300">
                    <div class="text-4xl mb-4">📝</div>
                    <h3 class="font-black text-xl text-slate-900 mb-2">
                        Isi Data Benar
                    </h3>
                    <p class="text-slate-500 leading-relaxed">
                        Pastikan data pendaftaran sesuai agar admin mudah melakukan verifikasi.
                    </p>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-xl rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-6 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-100 transition-all duration-300">
                    <div class="text-4xl mb-4">📢</div>
                    <h3 class="font-black text-xl text-slate-900 mb-2">
                        Pantau Info
                    </h3>
                    <p class="text-slate-500 leading-relaxed">
                        Baca informasi terbaru dari penyelenggara agar tidak ketinggalan update.
                    </p>
                </div>

            </div>
        </section>

        <!-- Contact CTA -->
        <section id="kontak" class="relative max-w-7xl mx-auto px-6 pt-10 pb-20">
            <div
                class="relative overflow-hidden bg-slate-950 rounded-[3rem] p-8 md:p-12 shadow-2xl shadow-slate-300/70">
                <div class="absolute -top-24 -left-24 w-72 h-72 bg-indigo-500 rounded-full blur-3xl opacity-30"></div>
                <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-fuchsia-500 rounded-full blur-3xl opacity-30"></div>

                <div class="relative grid lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <span
                            class="inline-block px-4 py-2 bg-white/10 text-indigo-200 rounded-full text-sm font-black uppercase tracking-wider mb-5">
                            Masih Bingung?
                        </span>

                        <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                            Admin Siap Membantu
                        </h2>

                        <p class="text-slate-300 text-lg leading-relaxed max-w-2xl">
                            Jika pertanyaanmu belum terjawab, kamu bisa menghubungi admin untuk mendapatkan bantuan terkait event, pendaftaran, tiket, atau pembayaran.
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-[2rem] p-6 md:p-8">
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 bg-white text-indigo-600 rounded-2xl flex items-center justify-center font-black shrink-0">
                                    1
                                </div>

                                <div>
                                    <h3 class="font-black text-white text-lg">
                                        Jelaskan Kendalamu
                                    </h3>
                                    <p class="text-slate-300">
                                        Tuliskan masalah yang kamu alami secara singkat dan jelas.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 bg-white text-fuchsia-600 rounded-2xl flex items-center justify-center font-black shrink-0">
                                    2
                                </div>

                                <div>
                                    <h3 class="font-black text-white text-lg">
                                        Sertakan Nama Event
                                    </h3>
                                    <p class="text-slate-300">
                                        Cantumkan nama event agar admin lebih mudah melakukan pengecekan.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-12 h-12 bg-white text-emerald-600 rounded-2xl flex items-center justify-center font-black shrink-0">
                                    3
                                </div>

                                <div>
                                    <h3 class="font-black text-white text-lg">
                                        Tunggu Konfirmasi
                                    </h3>
                                    <p class="text-slate-300">
                                        Admin akan membantu sesuai informasi yang kamu berikan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ $kontakUrl }}"
                            class="mt-7 inline-flex w-full items-center justify-center gap-2 px-7 py-4 bg-white text-slate-950 rounded-2xl font-black hover:bg-indigo-100 hover:-translate-y-1 active:translate-y-0 transition-all duration-300">
                            Hubungi Admin
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection