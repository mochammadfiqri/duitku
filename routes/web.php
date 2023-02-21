<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('/dashboard/index');
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

Route::prefix('pemasukan')->name('pemasukan.')->group(function () {
    Route::get('/', [PemasukanController::class, 'indexpemasukan'])->name('index');
    Route::post('/', [PemasukanController::class, 'store'])->name('store');
    Route::put('/{Modelpemasukan}', [PemasukanController::class, 'update'])->name('update');
    Route::delete('/{Modelpemasukan}', [PemasukanController::class, 'destroy'])->name('destroy');
});

Route::prefix('pengeluaran')->name('pengeluaran.')->group(function () {
    Route::get('/', [PengeluaranController::class, 'indexpengeluaran'])->name('index');
    Route::post('/', [PengeluaranController::class, 'store'])->name('store');
    Route::put('/{Modelpengeluaran}', [PengeluaranController::class, 'update'])->name('update');
    Route::delete('/{Modelpengeluaran}', [PengeluaranController::class, 'destroy'])->name('destroy');
});