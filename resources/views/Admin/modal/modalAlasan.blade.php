<form method="POST" action="{{ route('dashboard.rejectInvoice') }}">
    @csrf
    <div id="modalAlasan" class="modal" tabindex="-1">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Masukkan Alasan Anda Menolak</h5>
                <div class="form-group">
                    <input type="text" name="alasan_penolakan" class="form-control" id="alasan"
                        aria-describedby="alasan" placeholder="Masukkan Alasan">
                    <input type="text" name="kode_pembayaran" id="kode_pembayaran" hidden>
                    <input type="text" name="status" value="ditolak" hidden>
                </div>
                <div class="d-flex ms-auto mt-3">
                    <button type="submit" class="btn btn-success me-1 ">
                        Iya
                    </button>
                    <button type="submit" class="btn btn-danger ms-1">
                        Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>
