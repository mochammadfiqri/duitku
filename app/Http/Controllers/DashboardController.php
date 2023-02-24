<?php

namespace App\Http\Controllers;
use App\Models\Modelpemasukan;
use App\Models\Modelpengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('Dashboard.index');
    }
    
    // public function pemasukanHariIni()
    // {
    //     $pemasukanHariIni = ModelPemasukan::whereDate('tanggal', today())->sum('nominal');
    //     return view('Dashboard.index', ['pemasukanHariIni' => $pemasukanHariIni]);
    // }

    public function getTotalPemasukan($timePeriod) {
        
        if ($timePeriod == 'today') {
            $totalPemasukan = Modelpemasukan::whereDate('tanggal', today())->sum('nominal');
        } elseif ($timePeriod == 'this_month') {
            $totalPemasukan = Modelpemasukan::whereMonth('tanggal', today()->month)->sum('nominal');
        } elseif ($timePeriod == 'this_year') {
            $totalPemasukan = Modelpemasukan::whereYear('tanggal', today()->year)->sum('nominal');
        } else {
            $totalPemasukan = 0;
        }
        return $totalPemasukan;
    }

    public function getTotalPengeluaran($timePeriod) {
        if ($timePeriod == 'today') {
            $totalPemasukan = Modelpengeluaran::whereDate('tanggal', today())->sum('nominal');
        } elseif ($timePeriod == 'this_month') {
            $totalPemasukan = Modelpengeluaran::whereMonth('tanggal', today()->month)->sum('nominal');
        } elseif ($timePeriod == 'this_year') {
            $totalPemasukan = Modelpengeluaran::whereYear('tanggal', today()->year)->sum('nominal');
        } else {
            $totalPemasukan = 0;
        }
        return $totalPemasukan;
    }
}