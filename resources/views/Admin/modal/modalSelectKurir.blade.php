<form method="POST" action="{{ route('dashboard.acceptInvoice') }}">
    @csrf
    <div id="modalKirim" class="modal custom-modal">
        <div class="modal-dialog myModal modal-xl ">
            <div class="modal-content p-5">
                <h5>Terima Pembayaran dan Kirim Barang</h5>
                <div>
                    <p></p>
                </div>
                <div class="form-group">
                    <div class="mb-4">
                        <p>Pilih kurir yang akan mengirimkan barang.</p>
                        <select name="id_kurir" id="kelamin-user" class="custom-input form-control" required>
                            <option disabled selected>Pilih Kurir</option>
                            @foreach ($pengirim as $kurir)
                                <option value="{{ $kurir->user_id }}">{{ $kurir->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="text" name="kode_pembayaran" id="kode-pembayaran-kirim" hidden>
                    <input type="text" name="status" value="dibayar" hidden>
                    <input type="number" name="id_invoice" id="modal-id-invoice" value="" hidden>
                </div>
                <button type="submit" class="btn btn-primary">
                    Terima Dan Kirim
                </button>

            </div>
        </div>
    </div>
</form>
