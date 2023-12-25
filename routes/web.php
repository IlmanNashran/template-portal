<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\NewComplaintController;
use App\Http\Controllers\RespondedComplaintController;
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
Route::post('/new-complaints/{complaint}/update-technician',[NewComplaintController::class, 'updateTechnician'])->name('new-complaints.update-technician');
Route::post('/new-complaints/{complaint}/update-status',[NewComplaintController::class, 'updateStatus'])->name('new-complaints.update-status');

Route::get('/responded-complaints',[RespondedComplaintController::class, 'index'])->name('responded-complaints.index');
Route::post('/responded-complaints/{complaint}/update-status',[RespondedComplaintController::class, 'updateStatus'])->name('responded-complaints.update-status');

Route::get('/reports/category',[ReportController::class, 'fetchCategoryCount'])->name('reports.category');
Route::get('/reports/status',[ReportController::class, 'fetchStatusCount'])->name('reports.status');
