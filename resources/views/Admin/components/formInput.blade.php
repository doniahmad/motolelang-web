<form action="" class="pb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="form-title">
                Spesifikasi Kendaraan
            </div>
            <div class="form-input-container">
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="merk" class="custom-label form-label">Merk</label>
                            <input type="text" class="custom-input form-control" id="merk"
                                placeholder="Masukkan Merk">
                        </div>
                        <div class="mb-4">
                            <label for="kapasitas-cc" class="custom-label form-label">Kapasitas
                                Mesin</label>
                            <input type="text" class="custom-input form-control" id="kapasitas-cc"
                                placeholder="Masukkan Bahan Bakar">
                        </div>
                        <div class="mb-4">
                            <label for="odometer" class="custom-label form-label">Odometer</label>
                            <input type="text" class="custom-input form-control" id="odometer"
                                placeholder="Masukkan Odometer">
                        </div>
                        <div class="mb-4">
                            <label for="nomor-mesin" class="custom-label form-label">Nomor Mesin</label>
                            <input type="text" class="custom-input form-control" id="nomor-mesin"
                                placeholder="Masukkan Nomor Mesin">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="type" class="custom-label form-label">Type</label>
                            <input type="text" class="custom-input form-control" id="type"
                                placeholder="Masukkan Type">
                        </div>
                        <div class="mb-4">
                            <label for="bahan-bakar" class="custom-label form-label">Bahan Bakar</label>
                            <input type="text" class="custom-input form-control" id="bahan-bakar"
                                placeholder="Masukkan Bahan Bakar">
                        </div>
                        <div class="mb-4">
                            <label for="warna" class="custom-label form-label">Warna</label>
                            <input type="text" class="custom-input form-control" id="warna"
                                placeholder="Masukkan Warna">
                        </div>
                        <div class="mb-4">
                            <label for="nomor-rangka" class="custom-label form-label">Nomor Rangka</label>
                            <input type="text" class="custom-input form-control" id="nomor-rangka"
                                placeholder="Masukkan Nomor Rangka">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-title">
                Dokumen Kendaraan
            </div>
            <div class="form-input-container">
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="nomor-polisi" class="custom-label form-label">Nomor Polisi</label>
                            <input type="text" class="custom-input form-control" id="nomor-polisi"
                                placeholder="Masukkan Nomor Polisi">
                        </div>
                        <div class="mb-4">
                            <label for="stnk" class="custom-label form-label">STNK</label>
                            <input type="text" class="custom-input form-control" id="stnk"
                                placeholder="STNK Ada/Tidak Ada">
                        </div>
                        <div class="mb-4">
                            <label for="bpkb" class="custom-label form-label">BPKB</label>
                            <input type="text" class="custom-input form-control" id="bpkb"
                                placeholder="BPKB Ada/Tidak Ada">
                        </div>
                        <div class="mb-4">
                            <label for="form-a" class="custom-label form-label">Form A</label>
                            <input type="text" class="custom-input form-control" id="form-a"
                                placeholder="Form A Ada/Tidak Ada">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="masa-stnk" class="custom-label form-label">Masa Berlaku
                                STNK</label>
                            <input type="text" class="custom-input form-control" id="masa-stnk"
                                placeholder="Masukkan Masa Berlaku STNK">
                        </div>
                        <div class="mb-4">
                            <label for="faktur" class="custom-label form-label">Faktur</label>
                            <input type="text" class="custom-input form-control" id="faktur"
                                placeholder="Masukkan Faktur Ada/Tidak Ada">
                        </div>
                        <div class="mb-4">
                            <label for="kwitansi-blanko" class="custom-label form-label">Kwitansi
                                Blanko</label>
                            <input type="text" class="custom-input form-control" id="warna"
                                placeholder="Kwitansi Blanko Ada/Tidak Ada">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-form">
        <div class="mb-4 mt-4">
            <label for="status" class="custom-label form-label">Status Pelelangan</label>
            <input type="text" class="custom-input form-control" id="status" placeholder="Dibuka/Ditutup">
        </div>
        <div class="mb-4">
            <div class="input-datetime">
                <label for="exp-date" class="custom-label form-label">Batas Waktu Pelelangan</label>
                <input type="datetime-local" class="custom-input form-control" id="exp-date"
                    placeholder="Masukkan Batas Waktu Pelelangan">
            </div>
            {{-- <div class="input-group" id="exp-date" data-td-target-input="nearest"
                data-td-target-toggle="nearest">
                <span class="date-icon input-group-text" data-td-target="#exp-date"
                    data-td-toggle="datetimepicker">
                    <i class="fas fa-calendar"></i>
                </span>
                <input id="expdateInput" type="text" class="custom-input form-control"
                    data-td-target="#exp-date" placeholder="Tentukan Batas Waktu Pelelangan"
                    style="padding-left: 8px">
            </div> --}}
        </div>
        <div class="row">
            <div class="form-title">
                Detail Kendaraan
            </div>
            <div class="col">
                <div class="form-input-container detail-input">
                    <label for="desc-product" class="custom-label form-label">Deskripsi Produk</label>
                    <input type="text" class="custom-input form-control" id="desc-product"
                        placeholder="Masukkan Deskripsi Produk">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="imgInput" class="form-label">Masukkan Foto - Foto</label>
                    <input class="form-control" type="file" id="imgInput" multiple>
                </div>
                <div class="mb-3">
                    <div class="imgShowcase row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script type="text/javascript" src="/assets/admin/js/datetime.js"></script>
    <script type="text/javascript" src="/assets/admin/js/imgShow.js"></script>
@endpush
