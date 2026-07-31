@extends('layouts.app')

@section('title', 'Detail Event - ' . $event->title)

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100 py-16">
        <main class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">

                    @if ($event->poster_path)
                        <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                            class="w-full rounded-[2rem] shadow-2xl shadow-slate-300/70 border-8 border-white hover:scale-[1.02] transition duration-500">
                    @else
                        <img src="{{ asset('assets/concert.png') }}" alt="{{ $event->title }}"
                            class="w-full rounded-[2rem] shadow-2xl shadow-slate-300/70 border-8 border-white hover:scale-[1.02] transition duration-500">
                    @endif

                    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7">
                        <p class="text-sm font-bold text-indigo-600 mb-4 uppercase tracking-wider">
                            Kategori Event
                        </p>

                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-700 font-black">
                                {{ strtoupper(substr($event->category->name ?? 'E', 0, 2)) }}
                            </div>

                            <div>
                                <p class="font-black text-slate-800">
                                    {{ $event->category->name ?? 'Tanpa Kategori' }}
                                </p>
                                <p class="text-sm text-slate-500">
                                    AmikomEventHub
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-8">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <span
                        class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                        {{ $event->category->name ?? 'Event' }}
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black leading-tight text-slate-900 mt-5">
                        {{ $event->title }}
                    </h1>

                    <div class="flex items-center gap-2 mt-3">
                        @if ($event->averageRating() > 0)
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $event->averageRating())
                                        ⭐️
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </div>
                            <span class="text-slate-600 text-lg font-semibold">
                                ({{ number_format($event->averageRating(), 1) }}/5)
                            </span>
                        @else
                            <span class="text-slate-600 text-lg font-semibold">Belum ada rating</span>
                        @endif
                        <span class="text-slate-500 text-base">({{ $event->reviews()->count() }} ulasan)</span>
                    </div>

                    <div class="flex flex-wrap gap-5 text-slate-500 font-medium mt-6">
                        <div class="flex items-center gap-2 bg-slate-50 px-4 py-3 rounded-2xl">
                            📅
                            <span>
                                {{ $event->date ? $event->date->format('d F Y, H:i') : '-' }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2 bg-slate-50 px-4 py-3 rounded-2xl">
                            📍
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-4">
                        Deskripsi Event
                    </h3>

                    <p class="text-lg text-slate-600 leading-relaxed">
                        {{ $event->description }}
                    </p>
                </div>

                {{-- Review Section --}}
                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-6">
                        Ulasan Pengguna ({{ $event->reviews->count() }})
                    </h3>

                    @auth
                        @php
                            $user = Auth::user();
                            $hasPurchasedTicket = \App\Models\Transaction::where('customer_email', $user->email)
                                ->where('event_id', $event->id)
                                ->where('status', 'success')
                                ->exists();
                            $hasReviewed = \App\Models\Review::where('user_id', $user->id)
                                ->where('event_id', $event->id)
                                ->exists();
                            $eventEnded = \Carbon\Carbon::now()->greaterThan($event->date);
                        @endphp

                        @if ($eventEnded && $hasPurchasedTicket && !$hasReviewed)
                            <div class="mb-8 p-6 bg-slate-50 rounded-xl border border-slate-200">
                                <h4 class="text-xl font-bold text-slate-800 mb-4">Berikan Ulasan Anda</h4>
                                <form action="{{ route('reviews.store', $event) }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="rating" class="block text-slate-700 text-sm font-bold mb-2">Rating</label>
                                        <select name="rating" id="rating" class="shadow border rounded-lg w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                            <option value="">Pilih Rating</option>
                                            <option value="5">⭐️⭐️⭐️⭐️⭐️ (Sangat Baik)</option>
                                            <option value="4">⭐️⭐️⭐️⭐️ (Baik)</option>
                                            <option value="3">⭐️⭐️⭐️ (Cukup)</option>
                                            <option value="2">⭐️⭐️ (Buruk)</option>
                                            <option value="1">⭐️ (Sangat Buruk)</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="comment" class="block text-slate-700 text-sm font-bold mb-2">Komentar</label>
                                        <textarea name="comment" id="comment" rows="4" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Bagaimana pengalaman Anda?"></textarea>
                                    </div>
                                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150">
                                        Kirim Ulasan
                                    </button>
                                </form>
                            </div>
                        @elseif (!$eventEnded)
                            <p class="mb-4 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl">
                                Anda dapat memberikan ulasan setelah acara "{{ $event->title }}" berakhir.
                            </p>
                        @elseif (!$hasPurchasedTicket)
                            <p class="mb-4 p-4 bg-orange-50 border border-orange-200 text-orange-700 rounded-xl">
                                Anda perlu membeli tiket untuk acara ini sebelum bisa memberikan ulasan.
                            </p>
                        @elseif ($hasReviewed)
                            <p class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                                Anda sudah memberikan ulasan untuk acara ini.
                            </p>
                        @endif
                    @else
                        <p class="mb-4 p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl">
                            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login</a> untuk memberikan ulasan Anda tentang acara ini.
                        </p>
                    @endauth

                    @if ($event->reviews->isEmpty())
                        <p class="text-slate-500 italic">Belum ada ulasan untuk acara ini.</p>
                    @else
                        <div class="space-y-6">
                            @foreach ($event->reviews as $review)
                                <div class="p-6 bg-white border border-slate-200 rounded-xl shadow-sm">
                                    <div class="flex items-center mb-3">
                                        <div class="flex items-center text-yellow-400 mr-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    ⭐️
                                                @else
                                                    ☆
                                                @endif
                                            @endfor
                                        </div>
                                        <p class="font-semibold text-slate-800">{{ $review->user->name ?? 'Pengguna Anonim' }}</p>
                                        <span class="ml-auto text-sm text-slate-500">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-slate-700 leading-relaxed">{{ $review->comment ?? 'Tidak ada komentar.' }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>


                <div class="bg-slate-900 text-white rounded-[2rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500 opacity-30 rounded-full blur-3xl"></div>
                    <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-500 opacity-20 rounded-full blur-3xl"></div>

                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                        <div>
                            <p class="text-indigo-300 font-bold uppercase tracking-widest text-sm mb-3">
                                Harga Tiket
                            </p>

                            <h2 class="text-4xl md:text-5xl font-black">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                                <span class="text-lg font-medium text-slate-300">/ orang</span>
                            </h2>

                            <p class="mt-5 text-slate-300 flex items-center gap-2">
                                Sisa stok:
                                <span class="font-black text-white underline underline-offset-4">
                                    {{ $event->stock }} Tiket lagi!
                                </span>
                            </p>
                        </div>

                        <a href="{{ route('checkout', ['event' => $event->id]) }}"
                            class="inline-block px-10 py-5 bg-white text-indigo-700 rounded-2xl font-black text-lg shadow-xl hover:bg-indigo-600 hover:text-white hover:scale-105 active:scale-95 transition-all text-center">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-6">
                        Kebijakan Tiket
                    </h3>

                    <ul class="space-y-4 text-slate-600">
                        <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl">
                            ✅ <span>E-Ticket akan dikirimkan otomatis setelah pembayaran berhasil.</span>
                        </li>

                        <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl">
                            ✅ <span>Tiket dapat discan di pintu masuk saat check-in.</span>
                        </li>

                        <li class="flex items-start gap-3 bg-rose-50 p-4 rounded-2xl text-rose-600">
                            ⚠️ <span>Tiket yang sudah dibeli tidak dapat direfund.</span>
                        </li>
                    </ul>
                </div>

            </div>
        </main>
    </div>
@endsection