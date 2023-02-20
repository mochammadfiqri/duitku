<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Routing\RouteGroup;

//Route::get('/', [DashboardController::class, 'index']);

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard','index');
});

Route::controller(PemasukanController::class)->group(function(){
    Route::get('/pemasukan','indexpemasukan');
    Route::post('/pemasukan', 'App\Http\Controllers\PemasukanController@store');
    Route::put('/pemasukan-edit/{Modelpemasukan}', 'App\Http\Controllers\PemasukanController@update');
    Route::delete('/pemasukan-hapus/{Modelpemasukan}', 'App\Http\Controllers\PemasukanController@destroy');
});

Route::controller(PengeluaranController::class)->group(function(){
    Route::get('/pengeluaran','indexpengeluaran');
    Route::post('/pengeluaran', 'App\Http\Controllers\PengeluaranController@store');
    Route::put('/pengeluaran-edit/{Modelpengeluaran}', 'App\Http\Controllers\PengeluaranController@update');
    //Route::delete('/pengeluaran-hapus/{Modelpengeluaran}', 'App\Http\Controllers\PengeluaranController@destroy');
});

