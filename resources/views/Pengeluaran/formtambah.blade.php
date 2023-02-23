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
                        <label class="col-form-label">Nominal</label>
                        <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" placeholder="Masukan Nominal" class="form-control" name="tambahNominal" id="tambahNominal" value="{{ old('tambahNominal') }}" autofocus="true">
                    </div>
                <p>
                    <div class="mb-0">
                        <label class="form-label">Jenis Pengeluaran</label>
                        <div class="input-group">
                        <input type="text" placeholder="Masukan Jenis Pengeluaran" class="form-control" name="tambahJenis_pengeluaran" id="tambahJenis_pengeluaran" value="{{ old('tambahJenis_pengeluaran') }}">
                    </div>
                </p>
                <p>
                    <div class="mb-0">
                        <label class="form-label">Tanggal</label>
                        <div class="input-group">
                        <input type="date" class="form-control" name="tambahTanggal" id="tambahTanggal" value="{{ old('tambahTanggal') }}">
                    </div>
                </p>
                <div class="mb-0">
                    <label class="form-label">Keterangan</label>
                    <textarea placeholder="Masukan Keterangan" name="tambahKeterangan" id="tambahKeterangan" cols="10" rows="5" class="form-control">{{ old('tambahKeterangan') }}</textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
</div>