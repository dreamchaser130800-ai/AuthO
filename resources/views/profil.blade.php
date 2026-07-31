@extends('layouts.app')

@section('content')

<body class="bg-gradient-to-br from-sky-50 via-white to-blue-100 min-h-screen">

    <!-- Main -->
    <section class="container mx-auto px-6 py-16">

        <!-- Heading -->
        <div class="text-center mb-14">

            <p
                class="inline-block px-5 py-2 rounded-full bg-sky-100 text-sky-600 text-sm font-semibold tracking-[3px] uppercase">
                Student Profile
            </p>

            <h1 class="text-5xl font-extrabold text-slate-800 mt-6">
                Profil Mahasiswa
            </h1>

        </div>

        <!-- Card -->
        <div
            class="max-w-6xl mx-auto bg-white border border-sky-100 rounded-[40px] overflow-hidden shadow-2xl shadow-sky-100">

            <div class="grid grid-cols-1 lg:grid-cols-5">

                <!-- Left -->
                <div
                    class="lg:col-span-2 bg-gradient-to-br from-sky-400 via-sky-500 to-blue-500 p-10 flex flex-col items-center justify-center relative overflow-hidden">

                    <div class="absolute top-0 right-0 w-72 h-72 bg-white/20 rounded-full blur-3xl"></div>

                    <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-200/30 rounded-full blur-3xl"></div>

                    <div class="relative z-10 text-center">

                        <!-- Profile Image -->
                        <div
                            class="w-52 h-52 rounded-full overflow-hidden border-[6px] border-white shadow-2xl mx-auto hover:scale-105 transition duration-300">

                            <!-- Upload foto dari folder public/assets -->
                            <img src="{{ asset('assets/profil.png') }}" alt="Profile"
                                class="w-full h-full object-cover">

                        </div>

                        <h2 class="text-4xl font-extrabold text-white mt-8">
                            Bagoes Luhung Prasetyo
                        </h2>

                        <p class="text-sky-100 mt-2 text-lg">
                            Sistem Informasi
                        </p>

                        <!-- Info Box -->
                        <div class="flex justify-center gap-4 mt-10 flex-wrap">

                            <div class="bg-white/20 backdrop-blur px-6 py-4 rounded-3xl border border-white/20">

                                <p class="text-xs uppercase tracking-widest text-sky-100">
                                    Status
                                </p>

                                <p class="text-white font-bold mt-1">
                                    Mahasiswa
                                </p>

                            </div>

                            <div class="bg-white/20 backdrop-blur px-6 py-4 rounded-3xl border border-white/20">

                                <p class="text-xs uppercase tracking-widest text-sky-100">
                                    Angkatan
                                </p>

                                <p class="text-white font-bold mt-1">
                                    2024
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Right -->
                <div class="lg:col-span-3 p-10 md:p-14 bg-white">

                    <h3 class="text-3xl font-bold text-slate-800 mb-10">
                        Detail Informasi
                    </h3>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div
                            class="bg-sky-50 border border-sky-100 rounded-3xl p-6 hover:shadow-lg transition duration-300">

                            <p class="text-sm uppercase tracking-widest text-sky-500 mb-3">
                                Nama Lengkap
                            </p>

                            <h4 class="text-2xl font-bold text-slate-800">
                                Bagoes Luhung Prasetyo
                            </h4>

                        </div>

                        <div
                            class="bg-sky-50 border border-sky-100 rounded-3xl p-6 hover:shadow-lg transition duration-300">

                            <p class="text-sm uppercase tracking-widest text-sky-500 mb-3">
                                NIM
                            </p>

                            <h4 class="text-2xl font-bold text-slate-800">
                                24.12.3315
                            </h4>

                        </div>

                        <div
                            class="bg-sky-50 border border-sky-100 rounded-3xl p-6 hover:shadow-lg transition duration-300">

                            <p class="text-sm uppercase tracking-widest text-sky-500 mb-3">
                                Jurusan
                            </p>

                            <h4 class="text-2xl font-bold text-slate-800">
                                Sistem Informasi
                            </h4>

                        </div>

                        <div
                            class="bg-gradient-to-br from-sky-400 to-blue-500 rounded-3xl p-6 text-white shadow-lg">

                            <p class="uppercase tracking-widest text-sm text-sky-100 mb-3">
                                Tentang
                            </p>

                            <p class="leading-relaxed">
                                Mahasiswa Universitas Amikom Yogyakarta yang tertarik pada bidang
                                pengembangan web, UI/UX, serta teknologi digital modern.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

@endsection