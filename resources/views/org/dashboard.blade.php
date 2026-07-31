@extends('layouts.app')

@section('title', 'Organization Dashboard - AmikomEventHub')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 via-white to-slate-100 min-h-screen">
    <main class="container mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-black text-slate-900">
                Organization Dashboard
            </h1>
            <p class="text-slate-500 mt-3">
                Manage your events and see revenue analytics.
            </p>
            <div class="mt-4">
                <form action="{{ route('org.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Revenue Analytics -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-800 mb-6">Revenue Analytics</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-slate-600">Total Revenue</h3>
                    <p class="text-4xl font-bold text-indigo-600 mt-2">Rp 50,000,000</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-slate-600">Tickets Sold</h3>
                    <p class="text-4xl font-bold text-indigo-600 mt-2">1,234</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-slate-600">Events Hosted</h3>
                    <p class="text-4xl font-bold text-indigo-600 mt-2">15</p>
                </div>
            </div>
        </div>

        <!-- Event Management -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-800 mb-6">Manage Events</h2>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4">Event Name</th>
                            <th class="text-left py-3 px-4">Date</th>
                            <th class="text-left py-3 px-4">Location</th>
                            <th class="text-left py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4">Hackathon 2026</td>
                            <td class="py-3 px-4">30 Aug 2026</td>
                            <td class="py-3 px-4">Amikom University</td>
                            <td class="py-3 px-4">
                                <a href="#" class="text-indigo-600 hover:underline">Edit</a>
                                <a href="#" class="text-red-600 hover:underline ml-4">Delete</a>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">Design Workshop</td>
                            <td class="py-3 px-4">15 Sep 2026</td>
                            <td class="py-3 px-4">Online</td>
                            <td class="py-3 px-4">
                                <a href="#" class="text-indigo-600 hover:underline">Edit</a>
                                <a href="#" class="text-red-600 hover:underline ml-4">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create New Event Form -->
        <div>
            <h2 class="text-3xl font-bold text-slate-800 mb-6">Create New Event</h2>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <form>
                    <div class="mb-4">
                        <label for="event_name" class="block text-slate-700 font-semibold mb-2">Event Name</label>
                        <input type="text" id="event_name" name="event_name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label for="event_description" class="block text-slate-700 font-semibold mb-2">Description</label>
                        <textarea id="event_description" name="event_description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label for="event_date" class="block text-slate-700 font-semibold mb-2">Date</label>
                            <input type="date" id="event_date" name="event_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div class="mb-4">
                            <label for="event_location" class="block text-slate-700 font-semibold mb-2">Location</label>
                            <input type="text" id="event_location" name="event_location" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-indigo-700 transition">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
