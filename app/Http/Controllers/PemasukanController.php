<?php

namespace App\Http\Controllers;

use App\Models\Modelpemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class PemasukanController extends Controller
{
    public function indexpemasukan()
    {
        $data = [
            'dataPemasukan' => Modelpemasukan::paginate(10) //select * from pemasukan
        ];
        return view('Pemasukan.indexpemasukan', $data);
    }

    // public function create()
    // {
    //     return view('Pemasukan.formtambah');
    // }

    public function store(Request $request)
    {
        $tambah_pemasukan = new Modelpemasukan;
        $tambah_pemasukan->nominal = $request->tambahNominal;
        $tambah_pemasukan->jenis_pemasukan = $request->tambahJenis_pemasukan;
        $tambah_pemasukan->tanggal = $request->tambahTanggal;
        $tambah_pemasukan->keterangan = $request->tambahKeterangan;
        $tambah_pemasukan->save();
            if($tambah_pemasukan) {
                Session::flash('statusAdd', 'success');
                Session::flash('msgAdd', 'Data Pemasukan berhasil di simpan!');
            }
            return redirect('/pemasukan/indexpemasukan');
        // try {
        //     // $pemasukan = Modelpemasukan::create($request->all());
        //     $pemasukan = new Modelpemasukan();
        //     $pemasukan->nominal = $request->nominal;
        //     $pemasukan->jenis_pemasukan = $request->jenis_pemasukan;
        //     $pemasukan->tanggal = $request->tanggal;
        //     $pemasukan->keterangan = $request->keterangan;
        //     $pemasukan->save();
        //     if($pemasukan) {
        //         Session::flash('statusAdd', 'success');
        //         Session::flash('msgAdd', 'Data Pemasukan berhasil di simpan!');
        //     }
        //     return redirect('/pemasukan/indexpemasukan');
        // } catch (Throwable $err) {
        //     echo $err;
        // }
    }

    // public function edit(Request $request, $id)
    // {
    //     $pemasukan = Modelpemasukan::findorfail($id);
    //     return view('Pemasukan.edit', ['pemasukan' => $pemasukan]);
    // }

    public function update(Request $request, $id)
    {
        try {
            // $pemasukan = Modelpemasukan::findorfail($id);
            // $pemasukan->update($request->all());
            $update_pemasukan = Modelpemasukan::find($id);
            $update_pemasukan->nominal = $request->updateNominal;
            $update_pemasukan->jenis_pemasukan = $request->updateJenis_pemasukan;
            $update_pemasukan->tanggal = $request->updateTanggal;
            $update_pemasukan->keterangan = $request->updateKeterangan;
            $update_pemasukan->save();
            if($update_pemasukan) {
                Session::flash('statusUpdate', 'success');
                Session::flash('msgUpdate', 'Data Pemasukan berhasil di update!');
            }
            return redirect('/pemasukan/indexpemasukan');
        } catch (Throwable $err) {
            echo $err;
        }
    }
    
    // public function delete($id)
    // {
    //     return view('Pemasukan.hapus');
    // }

    public function destroy($id)
    {
        $hapus_pemasukan = Modelpemasukan::destroy($id);
        if($hapus_pemasukan) {
                Session::flash('statusDelete', 'success');
                Session::flash('msgDelete', 'Data Pemasukan berhasil di hapus!');
            }
            return redirect('/pemasukan/indexpemasukan');
    }
}
