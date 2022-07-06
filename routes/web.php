<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Financials;
use App\Http\Livewire\Mcap;
use App\Http\Livewire\PhysicalPerformance;
use App\Http\Livewire\TechnicalPerformance;
use App\Http\Livewire\UserManagement;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/', Dashboard::class)->name('home');

    Route::get('financials', Financials::class)->name('financials');
    Route::get('physical-performance', PhysicalPerformance::class)->name('physicals');
    Route::get('mcap', Mcap::class)->name('mcaps');

    Route::get('/user-management', UserManagement::class)->name('user-management');
    Route::get('/technical-performance', TechnicalPerformance::class)->name('technical-performance');
});

Route::get("log-message", function () {

    $message = "This is a sample message for Test.";

    Log::emergency($message);
    Log::alert($message);
    Log::critical($message);
    Log::error($message);
    Log::warning($message);
    Log::notice($message);
    Log::info($message);
    Log::debug($message);
});


