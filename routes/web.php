<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('outgoing', [OutgoingController::class, 'index'])->name('outgoing.index');
Route::post('outgoing', [OutgoingController::class, 'store'])->name('outgoing.store');
Route::get('outgoing/create', [OutgoingController::class, 'create'])->name('outgoing.create');
Route::get('outgoing/{outgoing}', [OutgoingController::class, 'show'])->name('outgoing.show');
Route::post('outgoing/{outgoing}/edit', [OutgoingController::class, 'update'])->name('outgoing.update');
Route::get('outgoing/{id}/edit', [OutgoingController::class, 'edit'])->name('outgoing.edit');
Route::post('outgoing/{id}/add/remark', [RemarkController::class, 'addOutgoing'])->name('outgoing.remark.add');
Route::get('dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/save', [AdminController::class, 'save'])->name('admin.save');
Route::post('outgoing',[AdminController::class,'save'])->name('outgoing');
Route::get('userprofile',[OutgoingController::class,'userprofile'])->name('outgoing.userprofile');

Route::get('incoming', [IncomingController::class, 'index'])->name('incoming.index');
Route::post('incoming', [IncomingController::class, 'store'])->name('incoming.store');
Route::get('incoming/create', [IncomingController::class, 'create'])->name('incoming.create');
Route::get('incoming/{incoming}', [IncomingController::class, 'show'])->name('incoming.show');
Route::post('incoming/{incoming}/edit', [IncomingController::class, 'update'])->name('incoming.update');
Route::get('incoming/{id}/edit', [IncomingController::class, 'edit'])->name('incoming.edit');
Route::get('profile',[IncomingController::class,'profile'])->name('incoming.profile');
Route::get('dashboard', [IncomingController::class,'dashboard'])->name('incoming.dashboard');
Route::get('trackingsystem-logs',[IncomingController::class, 'logs'])->name('incoming.logs');

Route::get('login', [LoginController::class, 'login'])->name('login.show');
Route::post('login',[LoginController::class,'loginUser'])->name('login');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('register',[LoginController::class, 'showRegister']);
Route::post('register',[LoginController::class, 'register']);
// Route::post('incoming',[LoginController::class,'loginUser'])->name('incoming');

Route::get('manage-accounts',[UserController::class,'manageuser'])->name('accounts');
Route::get('user/{user}', [UserController::class, 'show']);
