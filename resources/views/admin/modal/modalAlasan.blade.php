<form method="POST" action="{{ route('dashboard.rejectInvoice') }}" id="form-alasan">
    @csrf
    <div id="modalAlasan" class="modal custom-modal">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Masukkan Alasan Anda Menolak</h5>
                <div class="form-group">
                    <input type="text" name="alasan_penolakan" class="form-control" id="alasan"
                        aria-describedby="alasan" placeholder="Masukkan Alasan" required>
                    <input type="text" name="kode_pembayaran" id="kode_pembayaran" hidden>
                    <input type="text" name="status" value="ditolak" hidden>
                    <input type="submit" style="display:none" name="submitButton">
                </div>
                <div class="d-flex ms-auto mt-3">
                    <div class="btn btn-success me-1" onclick="rejectPembayaranJS(this)">
                        Kirim
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
