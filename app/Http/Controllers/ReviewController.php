<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        // Check if the event has ended
        if (Carbon::now()->lessThan($event->start_time)) {
            return redirect()->back()->with('error', 'Anda hanya bisa memberikan ulasan setelah acara selesai.');
        }

        // Check if the user has purchased a ticket for this event
        $hasPurchasedTicket = Transaction::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->where('status', 'success')
            ->exists();

        if (!$hasPurchasedTicket) {
            return redirect()->back()->with('error', 'Anda harus membeli tiket untuk acara ini sebelum bisa memberikan ulasan.');
        }

        // Check if the user has already reviewed this event
        $hasReviewed = Review::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($hasReviewed) {
            return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk acara ini.');
        }

        Review::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Ulasan Anda berhasil ditambahkan!');
    }
}
