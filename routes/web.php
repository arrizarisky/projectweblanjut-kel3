<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\ExportController;

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
    return view('welcome');
})->name('welcome');

Route::get('/company', function () {
    return view('company');
})->name('company');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('barang/restockHistory', [BarangController::class, 'restockHistory'])->name('barang.restockHistory');
    Route::resource('barang', BarangController::class)->except(['show']);;
    Route::resource('kategori', CategoryController::class);
    Route::resource('supplier', SuppliersController::class);
});

route::middleware(['auth','verified', 'user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
   
});

Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
   
    Route::get('barang/restock/{barang}', [BarangController::class, 'restockForm'])->name('barang.restock');
    Route::post('barang/restock/{barang}', [BarangController::class, 'restock'])->name('barang.restock.store');
    Route::get('barang/stock', [BarangController::class, 'stock'])->name('barang.stock');
});

 Route::get('user/barang/restockHistory', [BarangController::class, 'restockHistoryUser'])->name('user.barang.restockHistory');

Route::get('/export/barang/pdf', [ExportController::class, 'exportPDF'])->name('export.barang.pdf');
Route::get('/export/barang/excel', [ExportController::class, 'exportExcel'])->name('export.barang.excel');