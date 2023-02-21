<?php

namespace App\Http\Controllers;

use App\Models\Modelpemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class PemasukanController extends Controller
{
    public function indexpemasukan(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $DataPemasukan = Modelpemasukan::where('jenis_pemasukan', 'like', '%'.$search.'%')
            ->orWhere('nominal', 'like', '%'.$search.'%')
            ->orWhere('keterangan', 'like', '%'.$search.'%')
            ->sortable()
            ->paginate(10)->onEachSide(1)->fragment('pemasukan'); //select * from pemasukan
        } else {
            $DataPemasukan = Modelpemasukan::sortable()->paginate(10)->onEachSide(1)->fragment('pemasukan');
        }
        return view('Pemasukan.indexpemasukan')->with([
            'dataPemasukan' => $DataPemasukan,
            'search' => $search,
        ]);
    }

    public function store(Request $request)
    {
        $tambah_pemasukan = new Modelpemasukan;
        $tambah_pemasukan->nominal = $request->tambahNominal;
        $tambah_pemasukan->jenis_pemasukan = $request->tambahJenis_pemasukan;
        $tambah_pemasukan->tanggal = $request->tambahTanggal;
        $tambah_pemasukan->keterangan = $request->tambahKeterangan;
        $tambah_pemasukan->save();
            if($tambah_pemasukan) {
                Session::flash('statusAdd', 'Success');
                Session::flash('msgAdd', 'Data Pemasukan berhasil di simpan!');
            }
            return redirect('/pemasukan');
    }

    public function update(Request $request, $id)
    {
        try {
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
            return redirect('/pemasukan');
        } catch (Throwable $err) {
            echo $err;
        }
    }

    public function destroy($id)
    {
        $hapus_pemasukan = Modelpemasukan::destroy($id);
        if($hapus_pemasukan) {
                Session::flash('statusDelete', 'success');
                Session::flash('msgDelete', 'Data Pemasukan berhasil di hapus!');
            }
            return redirect('/pemasukan');
    }
}