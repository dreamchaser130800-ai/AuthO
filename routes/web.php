<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Org\OrgAuthController;
use App\Http\Controllers\Org\OrgDashboardController;


/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/profil', [HomeController::class, 'profil'])
    ->name('profil');

Route::get('/katalog', [HomeController::class, 'katalog'])
    ->name('katalog');

Route::get('/bantuan', [HomeController::class, 'bantuan'])
    ->name('bantuan');

Route::get('/contact', [HomeController::class, 'kontak'])
    ->name('kontak');

/*
|--------------------------------------------------------------------------
| GOOGLE SOCIALITE
|--------------------------------------------------------------------------
*/

Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])
    ->name('socialite.google.redirect');

Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])
    ->name('socialite.google.callback');


/*
|--------------------------------------------------------------------------
| EVENT FLOW
|--------------------------------------------------------------------------
*/

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout/{event}', [EventController::class, 'checkout'])
    ->name('checkout');

Route::post('/checkout/{event}/process', [EventController::class, 'processCheckout'])
    ->name('checkout.process');

Route::get('/payment/{transaction}', [EventController::class, 'payment'])
    ->name('payment');

Route::get('/payment/{transaction}/confirm', [EventController::class, 'confirmPayment'])
    ->name('payment.confirm');

Route::post('/payment/{transaction}/confirm', [EventController::class, 'processConfirmPayment'])
    ->name('payment.confirm.process');

Route::get('/success/{transaction}', [SuccessController::class, 'index'])
    ->name('success');

Route::get('/ticket/{transaction}/check', [SuccessController::class, 'check'])->name('ticket.check');

Route::get('/my-ticket/{transaction}', [EventController::class, 'ticket'])
    ->name('ticket');

/*
|--------------------------------------------------------------------------
| REVIEWS
|--------------------------------------------------------------------------
*/

Route::post('/events/{event}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| MIDTRANS CALLBACK
|--------------------------------------------------------------------------
*/

Route::post('/midtrans/webhook', [MidtransWebhookController::class, 'handle'])
    ->name('midtrans.webhook');

/*
|--------------------------------------------------------------------------
| ORGANIZATION AUTH & DASHBOARD
|--------------------------------------------------------------------------
*/

Route::prefix('org')->name('org.')->group(function () {
    Route::middleware('guest:organization')->group(function () {
        Route::get('register', [OrgAuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [OrgAuthController::class, 'register']);
        Route::get('login', [OrgAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [OrgAuthController::class, 'login']);
    });

    Route::middleware('auth:organization')->group(function () {
        Route::get('dashboard', [OrgDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [OrgAuthController::class, 'logout'])->name('logout');
        Route::resource('events', \App\Http\Controllers\Org\OrgEventController::class);
    });
});
/*
|--------------------------------------------------------------------------
| ADMIN AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/admin/login', [AuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('events', AdminEventController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('partners', PartnerController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');
    });