<!-- Modal -->
<div class="modal fade" id="modalTambahPemasukan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahPemasukan" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah <b>Pemasukan</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form class='form-group needs-validation' action="{{ action('App\Http\Controllers\PemasukanController@store') }}" method="POST">
        <div class="modal-body">
                @csrf
                    <div class="mb-0">
                        <label class="col-form-label">Nominal</label>
                        <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" placeholder="Masukan Nominal" class="form-control" name="tambahNominal" id="tambahNominal" autofocus="true">
                        <script src="jquery.masknumber.js"></script>
                        <script>
                            $(document).ready(function(){
                                $("#tambahNominal").keyup(function(){
                                    $(this).maskNumber({integer: true, thousands: "."})
                                })
                            })
                        </script>
                    </div>
                <p>
                    <div class="mb-0">
                    <label class="form-label">Jenis Pemasukan</label>
                    <div class="input-group">
                    <input type="text" placeholder="Masukan Jenis Pemasukan" class="form-control" name="tambahJenis_pemasukan" id="tambahJenis_pemasukan" value="{{ old('tambahNominal') }}">
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
                {{-- <div class="mb-0">
                    <label><small>Nominal</small></label>
                    <input type="text" placeholder="Masukan Nominal" name="tambahNominal" id="tambahNominal" class="form-control form-control-sm" autofocus="true" value="{{ old('tambahNominal') }}">
                </div>
                <div class="mb-0">
                    <label><small>Jenis Pemasukan</small></label>
                    <input type="text" placeholder="Masukan Jenis Pemasukan" name="tambahJenis_pemasukan" id="tambahJenis_pemasukan" class="form-control form-control-sm" value="{{ old('tambahJenis_pemasukan') }}">
                </div>
                <div class="mb-0">
                    <label><small>Tanggal</small></label>
                    <input type="date" name="tambahTanggal" id="tambahTanggal" class="form-control form-control-sm" value="{{ old('tambahTanggal') }}">
                </div>
                <div class="mb-0">
                    <label><small>Keterangan</small></label>
                    <textarea placeholder="Masukan Keterangan" name="tambahKeterangan" id="tambahKeterangan" cols="10" rows="5" class="form-control form-control-sm">{{ old('tambahKeterangan') }}</textarea>
                </div>  --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
</div>