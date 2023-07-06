<?php

use App\Http\Controllers\ShortController;
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

Route::get('/', [ShortController::class, 'index']);
Route::post('/generate-shorten-link', [ShortController::class, 'store'])->name('generate.short.link');
Route::get('/{code}', [ShortController::class, 'show'])->name('show.shorten.link');

