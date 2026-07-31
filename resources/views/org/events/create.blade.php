@extends('layouts.org')

@section('title', 'Buat Event Baru')

@section('content')
<div class="py-8 px-4 md:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Buat Event Baru</h1>
        <a href="{{ route('org.events.index') }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">
            &larr; Kembali ke Daftar Event
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-xl p-8">
        <form action="{{ route('org.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Judul Event</label>
                    <input type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-1">
                    <label for="category_id" class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <select name="category_id" id="category_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-2">
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required></textarea>
                </div>

                <div class="col-span-1">
                    <label for="date" class="block text-sm font-bold text-gray-700 mb-2">Tanggal & Waktu</label>
                    <input type="datetime-local" name="date" id="date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-1">
                    <label for="location" class="block text-sm font-bold text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="location" id="location" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-1">
                    <label for="price" class="block text-sm font-bold text-gray-700 mb-2">Harga Tiket (Rp)</label>
                    <input type="number" name="price" id="price" min="0" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-1">
                    <label for="stock" class="block text-sm font-bold text-gray-700 mb-2">Jumlah Tiket</label>
                    <input type="number" name="stock" id="stock" min="1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>

                <div class="col-span-2">
                    <label for="poster" class="block text-sm font-bold text-gray-700 mb-2">Poster Event</label>
                    <input type="file" name="poster" id="poster" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition-colors duration-300">
                    Simpan Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
