<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelpengeluaran;
use Illuminate\Support\Facades\Session;

class PengeluaranController extends Controller
{
    public function indexpengeluaran(Request $request)
    {
        $search = $request->search;
        $data = [
            'dataPengeluaran' => Modelpengeluaran::where('jenis_pengeluaran', 'like', '%'.$search.'%')
            ->orWhere('nominal', 'like', '%'.$search.'%')
            ->orWhere('keterangan', 'like', '%'.$search.'%')
            ->paginate(10) //select * from pengeluaran
        ];
        return view('Pengeluaran.indexpengeluaran', $data);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
