<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;
use App\Http\Models\Incoming;

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
});


Route::resource("/outgoing", OutgoingController::class);
Route::get('incoming', [IncomingController::class, 'index'])->name('index');
Route::post('incoming', [IncomingController::class, 'store']);
Route::get('incoming/create', [IncomingController::class, 'create']);
Route::get('incoming/{incoming}', [IncomingController::class, 'show']);
Route::post('incoming/{incoming}/edit', [IncomingController::class, 'update']);
Route::get('incoming/{id}/edit', [IncomingController::class, 'edit']);


