<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use Illuminate\Routing\RouteGroup;

Route::get('/', [DashboardController::class, 'index']);

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard/index','index');
});

Route::controller(PemasukanController::class)->group(function(){
    Route::get('/pemasukan/indexpemasukan','indexpemasukan');
    Route::post('/pemasukan/indexpemasukan', 'App\Http\Controllers\PemasukanController@store');
    Route::put('/pemasukan/indexpemasukan/{Modelpemasukan}', 'App\Http\Controllers\PemasukanController@update');
    Route::delete('/pemasukan/indexpemasukan/{Modelpemasukan}', 'App\Http\Controllers\PemasukanController@destroy');
});

