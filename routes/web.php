<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\NewComplaintController;
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
Route::post('/complaints/create',[ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/complaints/{complaint}',[ComplaintController::class, 'show'])->name('complaints.show');

Route::get('/new-complaints',[NewComplaintController::class, 'index'])->name('new-complaints.index');
Route::get('/new-complaints/{complaint}',[NewComplaintController::class, 'edit'])->name('new-complaints.edit');
Route::post('/new-complaints/{complaint}',[NewComplaintController::class, 'update'])->name('new-complaints.update');


Route::get('/reports/category',[ReportController::class, 'fetchCategoryCount'])->name('reports.category');
Route::get('/reports/status',[ReportController::class, 'fetchStatusCount'])->name('reports.status');
