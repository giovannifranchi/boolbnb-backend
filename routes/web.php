<?php

use App\Http\Controllers\Admin\ApartmentsController;
use App\Http\Controllers\Admin\BraintreeController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\GalleryImagesController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatsController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('apartments', ApartmentsController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('plans', PlansController::class);
    Route::delete('/gallery/{image}', [GalleryImagesController::class, 'destroy'])->name('admin.gallery.destroy');
    Route::get('/messages/{id}', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/delete/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');


    Route::get('/gallery/{apartment}', [GalleryImagesController::class, 'index'])->name('gallery.index');
    Route::resource('payments', PaymentController::class);
    Route::get('braintree/{plan}/{apartment}', [BraintreeController::class, 'token'])->name('braintree.token');
    Route::post('braintree/checkout', [BraintreeController::class, 'checkout'])->name('braintree.checkout');


    Route::get('/stats', [StatsController::class, 'index'])->name('stats.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
