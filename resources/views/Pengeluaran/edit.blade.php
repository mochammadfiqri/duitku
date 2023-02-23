<!-- Modal -->
<div class="modal fade" id="modalEditPengeluaran{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditPengeluaran" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Edit <b>Pengeluaran</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="/pengeluaran/{{ $data->id }}" method="POST">
        <div class="modal-body">
                @csrf
                @method('PUT')
                <label class="form-label">Nominal</label>
                <div class="input-group mb-0">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" placeholder="Masukan Nominal" name="updateNominal" id="updateNominal" class="form-control" value="{{ $data->nominal }}" required>
                </div>
                <p>
                    <div class="mb-0">
                        <label class="form-label">Jenis Pengeluaran</label>
                        <input type="text" placeholder="Masukan Jenis Pengeluaran" name="updateJenis_pengeluaran" id="updateJenis_pengeluaran" class="form-control" value="{{ $data->jenis_pengeluaran }}" required>
                    </div>
                </p>
                <p>
                    <div class="mb-0">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="updateTanggal" id="updateTanggal" class="form-control" value="{{ $data->tanggal }}" required>
                    </div>
                </p>
                <div class="mb-0">
                    <label class="form-label">Keterangan</label>
                    <textarea placeholder="Masukan Keterangan" name="updateKeterangan" id="updateKeterangan" cols="5" rows="5" class="form-control">{{ $data->keterangan }}</textarea>
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