<form method="POST" action="{{ route('dashboard.setAuction') }}">
    @csrf
    <div id="modalPublish" class="modal">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Mulai Pelelangan</h5>
                <div class="form-group">
                    <div>
                        <p>Mulai pelelangan pada product :</p>
                        <div class="detail-product-before-lelang" id="detail-product-before">
                            <table>
                                <tr>
                                    <td>Nama Product</td>
                                    <td>:</td>
                                    <td id="name-product-value"></td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td>:</td>
                                    <td id="merk-value"></td>
                                </tr>
                                <tr>
                                    <td>Bahan Bakar</td>
                                    <td>:</td>
                                    <td id="bahan-bakar-value"></td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>:</td>
                                    <td id="jenis-value"></td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td>:</td>
                                    <td id="warna-value"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="" alt="" id="img-value">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="input-datetime">
                        <label for="exp_date" class="custom-label form-label">Batas Waktu Pelelangan</label>
                        <input name="exp_date" type="datetime-local" class="custom-input form-control" id="exp_date"
                            placeholder="Masukkan Batas Waktu Pelelangan" required>
                    </div>
                    <input name="id_product" type="text" id="id-product" hidden>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Publish
                </button>
            </div>
        </div>
    </div>
</form>
