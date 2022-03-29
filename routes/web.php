<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Financials;
use App\Http\Livewire\PhysicalPerformance;
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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/', Dashboard::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('financials', Financials::class)->name('financials');
Route::middleware(['auth:sanctum', 'verified'])->get('physical-performance', PhysicalPerformance::class)->name('physicals');
