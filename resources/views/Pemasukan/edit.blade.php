<!-- Modal -->
<div class="modal fade" id="modalEditPemasukan{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditBarang" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Edit <b>Pemasukan</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="/pemasukan-edit/{{ $data->id }}" method="POST">
        <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="mb-0">
                    <label><small>Nominal</small></label>
                    <input type="text" placeholder="Masukan Nominal" name="updateNominal" id="updateNominal" class="form-control" value="{{ $data->nominal }}" required>
                </div><br>
                <div class="mb-0">
                    <label><small>Jenis Pemasukan</small></label>
                    <input type="text" placeholder="Masukan Jenis Pemasukan" name="updateJenis_pemasukan" id="updateJenis_pemasukan" class="form-control" value="{{ $data->jenis_pemasukan }}" required>
                </div><br>
                <div class="mb-0">
                    <label><small>Tanggal</small></label>
                    <input type="date" name="updateTanggal" id="updateTanggal" class="form-control" value="{{ $data->tanggal }}" required>
                </div><br>
                <div class="mb-0">
                    <label><small>Keterangan</small></label>
                    <input type="text" placeholder="Masukan Keterangan" name="updateKeterangan" id="updateKeterangan" rows="4" class="form-control" value="{{ $data->keterangan }}">
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