<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelpengeluaran;
use Illuminate\Support\Facades\Session;
use Throwable;

class PengeluaranController extends Controller
{
    public function indexpengeluaran(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $DataPengeluaran = Modelpengeluaran::where('jenis_pengeluaran', 'like', '%'.$search.'%')
            ->orWhere('nominal', 'like', '%'.$search.'%')
            ->orWhere('keterangan', 'like', '%'.$search.'%')
            ->sortable()
            ->paginate(10)->onEachSide(1)->fragment('pemasukan');
        } else {
            $DataPengeluaran = Modelpengeluaran::sortable()->paginate(10)->onEachSide(1)->fragment('pengeluaran');
        }
        return view('Pengeluaran.indexpengeluaran')->with([
            'dataPengeluaran' => $DataPengeluaran,
            'search' => $search,
        ]);
        // $search = $request->search;
        // $data = [
        //     'dataPengeluaran' => Modelpengeluaran::where('jenis_pengeluaran', 'like', '%'.$search.'%')
        //     ->orWhere('nominal', 'like', '%'.$search.'%')
        //     ->orWhere('keterangan', 'like', '%'.$search.'%')
        //     ->paginate(10) //select * from pengeluaran
        // ];
        // return view('Pengeluaran.indexpengeluaran', $data);
    }

    public function store(Request $request)
    {
        $tambah_pengeluaran = new Modelpengeluaran;
        $tambah_pengeluaran->nominal = $request->tambahNominal;
        $tambah_pengeluaran->jenis_pengeluaran = $request->tambahJenis_pengeluaran;
        $tambah_pengeluaran->tanggal = $request->tambahTanggal;
        $tambah_pengeluaran->keterangan = $request->tambahKeterangan;
        $tambah_pengeluaran->save();
        if($tambah_pengeluaran) {
            Session::flash('StatusAdd', 'Success');
            Session::flash('msgAdd', 'Data Pengeluaran berhasil di simpan!');
        }
        return redirect('/pengeluaran');
    }

    public function update(Request $request, $id)
    {
        try {
            $update_pengeluaran = Modelpengeluaran::find($id);
            $update_pengeluaran->nominal = $request->updateNominal;
            $update_pengeluaran->jenis_pengeluaran = $request->updateJenis_pengeluaran;
            $update_pengeluaran->tanggal = $request->updateTanggal;
            $update_pengeluaran->keterangan = $request->updateKeterangan;
            $update_pengeluaran->save();
            if ($update_pengeluaran) {
                Session::flash('statusUpdate', 'Success');
                Session::flash('msgUpdate', 'Data Pengeluaran berhasil di update!');
            }
            return redirect('/pengeluaran');
        } catch (Throwable $err) {
            echo $err;
        }
    }

    public function destroy($id)
    {
        $hapus_pengeluaran = Modelpengeluaran::destroy($id);
        if ($hapus_pengeluaran) {
            Session::flash('statusDelete', 'Success');
            Session::flash('msgDelete', 'Data Pengeluaran berhasil di hapus!');
        }
        return redirect('/pengeluaran');
    }
}
