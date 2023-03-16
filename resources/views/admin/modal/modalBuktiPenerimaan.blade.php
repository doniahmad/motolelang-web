<form method="POST" id="form-penerimaan" enctype="multipart/form-data">
    @csrf
    <div id="modalPenerimaan" class="modal custom-modal">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Masukkan Foto Penerimaan Barang</h5>
                <div class="form-group mb-4">
                    <input type="file" name="bukti_penerimaan" class="form-control" id="bukti-penerimaan"
                        aria-describedby="bukti-penerimaan" placeholder="Masukkan Bukti Penerimaan" required>
                    {{-- <input type="text" id="input-id-pengiriman"> --}}
                </div>
                <button type="submit" class="btn btn-primary">
                    Kirim Bukti
                </button>
            </div>
        </div>
    </div>
</form>
