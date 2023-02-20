<!-- Modal -->
<div class="modal fade" id="modalHapusPengeluaran{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusPengeluaran" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title fs-5" id="staticBackdropLabel">Anda yakin akan menghapus data pengeluaran ini ?<br><span>( {{ $data->jenis_pengeluaran }} dengan Nominal {{ $data->nominal }} )</span></b></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="/pengeluaran/{{ $data->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>