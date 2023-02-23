<?php

namespace App\Http\Controllers;
use App\Models\Modelpemasukan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('Dashboard.index');
    }
    
    public function pemasukanHariIni()
    {
        $pemasukanHariIni = ModelPemasukan::whereDate('tanggal', today())->sum('nominal');
        return view('Dashboard.index', ['pemasukanHariIni' => $pemasukanHariIni]);
    }

    // public function pemasukan() {
    //     return view('Pemasukan.indexpemasukan');
    // }
    // public function posts() {
    //     return view('Posts.index');
    // }
}
