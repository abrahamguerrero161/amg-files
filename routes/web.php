<?php

use App\Http\Livewire\ShowGallery;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPosts;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowPosts::class)->middleware('can:dashboard')->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/gallery', ShowGallery::class)->name('gallery');
