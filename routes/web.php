<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class,'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function(){
    return redirect('/admin');

});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/projectmanager', [AdminController::class, 'dashboard'])->middleware('userAkses:Project Manager');
    Route::get('/admin/employee', [AdminController::class, 'dashboard'])->middleware('userAkses:Employee');
    Route::get('/admin/marketing', [AdminController::class, 'dashboard'])->middleware('userAkses:Marketing');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/project', [AdminController::class, 'project']);
    Route::get('/client', [AdminController::class, 'client'])->name('pages.client');
    Route::get('/reportProject', [AdminController::class, 'reportProject'])->name('pages.reportProject');

    // Route Pages
    Route::get('/admin/projectmanager/approvalclient', [AdminController::class, 'approval'])->name('pages.approval');
    Route::get('/admin/projectmanager/progresProject', [AdminController::class, 'progres'])->name('admin.prgoresProject');
    Route::get('/admin/detailJob', [AdminController::class, 'detailJob'])->name('admin.detailJob');
    // Route::post('/admin/detailJob', [AdminController::class, 'detailJob'])->name('admin.detailJob');

    Route::post('/admin/insertJob', [AdminController::class, 'insertJob'])->name('admin.insertJob');

    Route::post('/admin/insertEvaluasi', [AdminController::class, 'insertEvaluasi'])->name('admin.insertEvaluasi');

    // Logout
    Route::get('/logout', [SesiController::class, 'logout']);

    // Insert Data
    Route::post('/addclient', [AdminController::class, 'store'])->name('pages.store');
    Route::post('/InsertProject', [AdminController::class, 'InsertProject']);

    
});
