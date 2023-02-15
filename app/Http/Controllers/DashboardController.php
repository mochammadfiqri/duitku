<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('Dashboard.index');
    }
    
    // public function pemasukan() {
    //     return view('Pemasukan.indexpemasukan');
    // }
    // public function posts() {
    //     return view('Posts.index');
    // }
}
