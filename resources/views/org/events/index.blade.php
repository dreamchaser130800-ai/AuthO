@extends('layouts.org')

@section('title', 'Kelola Event')

@section('content')
    <div class="py-8 px-4 md:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Kelola Event</h1>
            <a href="{{ route('org.events.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors duration-300">
                Buat Event Baru
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th class="py-4 px-6 text-left text-xs font-bold text-indigo-800 uppercase tracking-wider">Judul Event</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-indigo-800 uppercase tracking-wider">Tanggal</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-indigo-800 uppercase tracking-wider">Lokasi</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-indigo-800 uppercase tracking-wider">Harga</th>
                            <th class="py-4 px-6 text-left text-xs font-bold text-indigo-800 uppercase tracking-wider">Stok</th>
                            <th class="py-4 px-6 text-right text-xs font-bold text-indigo-800 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($events as $event)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900">{{ $event->title }}</div>
                                    <div class="text-xs text-gray-500">{{ $event->category->name }}</div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">{{ $event->date->format('d M Y, H:i') }}</td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">{{ $event->location }}</td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">{{ $event->stock }}</td>
                                <td class="py-4 px-6 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('org.events.edit', $event) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                    <form action="{{ route('org.events.destroy', $event) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 px-6 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Event</h3>
                                        <p class="text-gray-500">Anda belum membuat event apapun. Mulai buat event pertama Anda!</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
