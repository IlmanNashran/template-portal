<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ReportController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/complaints',[ComplaintController::class, 'index'])->name('complaints.index');
Route::get('/complaints/create',[ComplaintController::class, 'create'])->name('complaints.create');

Route::get('/reports/category',[ReportController::class, 'fetchCategoryCount'])->name('reports.category');
Route::get('/reports/status',[ReportController::class, 'fetchStatusCount'])->name('reports.status');
