<!-- Modal -->
<div class="modal fade" id="modalTambahPengeluaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahPengeluaran" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah <b>Pengeluaran</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ action('App\Http\Controllers\PengeluaranController@store') }}" method="POST">
        <div class="modal-body">
                @csrf
                <div class="mb-0">
                    <label><small>Nominal</small></label>
                    <input type="text" placeholder="Masukan Nominal" name="tambahNominal" id="tambahNominal" class="form-control" required>
                </div><br>
                <div class="mb-0">
                    <label><small>Jenis Pengeluaran</small></label>
                    <input type="text" placeholder="Masukan Jenis Pengeluaran" name="tambahJenis_pengeluaran" id="tambahJenis_pengeluaran" class="form-control" required>
                </div><br>
                <div class="mb-0">
                    <label><small>Tanggal</small></label>
                    <input type="date" name="tambahTanggal" id="tambahTanggal" class="form-control" required>
                </div><br>
                <div class="mb-0">
                    <label><small>Keterangan</small></label>
                    <input type="text" placeholder="Masukan Keterangan" name="tambahKeterangan" id="tambahKeterangan" rows="4" class="form-control">
                </div><br> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
</div>