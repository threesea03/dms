<?php

use App\Http\Controllers\ComputeTimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

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
Route::get('dashboard/test',[DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('userprofile', [OutgoingController::class,'userprofile'])->name('outgoing.userprofile');

Route::get('incoming', [IncomingController::class, 'index'])->name('incoming.index');
Route::post('incoming', [IncomingController::class, 'store'])->name('incoming.store');
Route::get('incoming/create', [IncomingController::class, 'create'])->name('incoming.create');
Route::get('incoming/{incoming}', [IncomingController::class, 'show'])->name('incoming.show');
Route::post('incoming/{incoming}/edit', [IncomingController::class, 'update'])->name('incoming.update');
Route::get('incoming/{id}/edit', [IncomingController::class, 'edit'])->name('incoming.edit');
Route::get('profile',[IncomingController::class,'profile'])->name('incoming.profile');
// Route::get('dashboard', [IncomingController::class,'dashboard'])->name('incoming.dashboard');
Route::get('trackingsystem-logs',[IncomingController::class, 'logs'])->name('incoming.logs');


Route::post('incoming/{id}/add/remark',[RemarkController::class, 'addIncoming'])->name('incoming.remark.add');

Route::get('DTR', [ComputeTimeController::class, 'computeTime']);

Route::get('login', [LoginController::class, 'login'])->name('login.show');
Route::post('login',[LoginController::class,'loginUser'])->name('login');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('register',[LoginController::class, 'showRegister'])->name(('showRegister'));
Route::post('register',[LoginController::class, 'register']);
Route::post('user/delete/{id}',[LoginController::class,'destroy']);
Route::post('setup-password',[LoginController::class,'forgotPassword'])->name('setup.password');
Route::get('changepassword',[LoginController::class,'setup'])->name('changepassword');
// Route::post('incoming',[LoginController::class,'loginUser'])->name('incoming');

Route::get('manage-accounts',[UserController::class,'manageuser'])->name('accounts');
Route::get('user/{user}', [UserController::class, 'show']);

Route::get('report', [ReportController::class, 'report'])->name('incoming.report');
Route::post('report', [ReportController::class, 'dateFilter'])->name('incoming.dateFilter');
Route::get('report/generateExcel', [ReportController::class, 'exportExcelReport'])->name('generate.report');
Route::get('report/generatePDF', [ReportController::class, 'exportPDFReport'])->name('generatepdf.report');
Route::get('report/generateCSV', [ReportController::class, 'exportCSVReport'])->name('generatecsv.report');