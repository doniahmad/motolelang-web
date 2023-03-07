<form method="{{ $method }}" action="{{ $path }}" class="pb-5" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-4">
            <label for="nama-product" class="custom-label form-label">Nama Product</label>
            <input name="nama_product" type="text" class="custom-input form-control" id="nama-product"
                placeholder="Masukkan Nama Produk" value="{{ $data->nama_product ? $data->nama_product : '' }}"
                required>
        </div>
        <div class="col-md-6">
            <div class="form-title">
                Spesifikasi Kendaraan
            </div>
            <div class="form-input-container">
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="harga_awal" class="custom-label form-label">Harga Awal</label>
                            <input name="harga_awal" type="number" class="custom-input form-control" id="harga_awal"
                                placeholder="Masukkan Harga Awal"
                                value="{{ $data->harga_awal ? $data->harga_awal : '' }}" required>
                            @error('harga_awal')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="merk" class="custom-label form-label">Merk</label>
                            <input name="merk" type="text" class="custom-input form-control" id="merk"
                                placeholder="Masukkan Merk" value="{{ $data->merk ? $data->merk : '' }}" required>
                            @error('merk')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="kapasitas-cc" class="custom-label form-label">Kapasitas
                                Mesin</label>
                            <input name="kapasitas_cc" type="number" class="custom-input form-control"
                                id="kapasitas-cc" placeholder="Masukkan Bahan Bakar"
                                value="{{ $data->kapasitas_cc ? $data->kapasitas_cc : '' }}" required>
                            @error('kapasitas_cc')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="odometer" class="custom-label form-label">Odometer</label>
                            <input name="odometer" type="number" class="custom-input form-control" id="odometer"
                                placeholder="Masukkan Odometer" value="{{ $data->odometer ? $data->odometer : '' }}"
                                required>
                            @error('odometer')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="type" class="custom-label form-label">Type</label>
                            <input name="jenis" type="text" class="custom-input form-control" id="type"
                                placeholder="Masukkan Type" value="{{ $data->jenis ? $data->jenis : '' }}" required>
                            @error('jenis')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="bahan-bakar" class="custom-label form-label">Bahan Bakar</label>
                            <input name="bahan_bakar" type="text" class="custom-input form-control" id="bahan-bakar"
                                placeholder="Masukkan Bahan Bakar"
                                value="{{ $data->bahan_bakar ? $data->bahan_bakar : '' }}" required>
                            @error('bahan_bakar')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="warna" class="custom-label form-label">Warna</label>
                            <input name="warna" type="text" class="custom-input form-control" id="warna"
                                placeholder="Masukkan Warna" value="{{ $data->warna ? $data->warna : '' }}" required>
                            @error('warna')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nomor-rangka" class="custom-label form-label">Nomor Rangka</label>
                            <input name="nomor_rangka" type="text" class="custom-input form-control"
                                id="nomor-rangka" placeholder="Masukkan Nomor Rangka"
                                value="{{ $data->nomor_rangka ? $data->nomor_rangka : '' }}" required>
                            @error('nomor_rangka')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
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
                            <input name="nomor_polisi" type="text" class="custom-input form-control"
                                id="nomor-polisi" placeholder="Masukkan Nomor Polisi"
                                value="{{ $data->nomor_polisi ? $data->nomor_polisi : '' }}" required>
                            @error('nomor_polisi')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stnk" class="custom-label form-label">STNK</label>
                            <select name="stnk" id="stnk" class="custom-input form-control" required>
                                <option disabled selected>Pilih Ada/Tidak Ada</option>
                                <option value="1" {{ $data->stnk == 1 ? 'selected' : '' }}>Ada</option>
                                <option value="0" {{ $data->stnk == 0 ? 'selected' : '' }}>Tidak Ada</option>
                            </select>
                            @error('stnk')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="bpkb" class="custom-label form-label">BPKB</label>
                            <select name="bpkb" id="bpkb" class="custom-input form-control" required>
                                <option disabled selected>Pilih Ada/Tidak Ada</option>
                                <option value="1" {{ $data->bpkb == 1 ? 'selected' : '' }}>Ada</option>
                                <option value="0" {{ $data->bpkb == 0 ? 'selected' : '' }}>Tidak Ada</option>
                            </select>
                            @error('bpkb')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="form-a" class="custom-label form-label">Form A</label>
                            <select name="form_a" id="form_a" class="custom-input form-control" required>
                                <option disabled selected>Pilih Ada/Tidak Ada</option>
                                <option value="1" {{ $data->form_a == 1 ? 'selected' : '' }}>Ada</option>
                                <option value="0" {{ $data->form_a == 0 ? 'selected' : '' }}>Tidak Ada</option>
                            </select>
                            @error('form_a')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="masa-stnk" class="custom-label form-label">Masa Berlaku
                                STNK</label>
                            <input name="masa_stnk" type="date" class="custom-input form-control" id="masa-stnk"
                                placeholder="Masukkan Masa Berlaku STNK"
                                value="{{ $data->masa_stnk ? $data->masa_stnk : '' }}" required>
                            @error('masa_stnk')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="faktur" class="custom-label form-label">Faktur</label>
                            <select name="faktur" id="faktur" class="custom-input form-control" required>
                                <option disabled selected>Pilih Ada/Tidak Ada</option>
                                <option value="1" {{ $data->faktur == 1 ? 'selected' : '' }}>Ada</option>
                                <option value="0" {{ $data->faktur == 0 ? 'selected' : '' }}>Tidak Ada</option>
                            </select>
                            @error('faktur')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="kwitansi_blanko" class="custom-label form-label">Kwitansi
                                Blanko</label>
                            <select name="kwitansi_blanko" id="kwitansi_blanko" class="custom-input form-control"
                                required>
                                <option disabled selected>Pilih Ada/Tidak Ada</option>
                                <option value="1" {{ $data->kwitansi_blanko == 1 ? 'selected' : '' }}>Ada
                                </option>
                                <option value="0" {{ $data->kwitansi_blanko == 0 ? 'selected' : '' }}>Tidak Ada
                                </option>
                            </select>
                            @error('kwitansi_blanko')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nomor-mesin" class="custom-label form-label">Nomor Mesin</label>
                            <input name="nomor_mesin" type="text" class="custom-input form-control"
                                id="nomor-mesin" placeholder="Masukkan Nomor Mesin"
                                value="{{ $data->nomor_mesin ? $data->nomor_mesin : '' }}" required>
                            @error('nomor_mesin')
                                <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-form">
        <div class="row mt-4">
            <div class="form-title">
                Detail Kendaraan
            </div>
            <div class="col">
                <div class="form-input-container detail-input">
                    <label for="deskripsi" class="custom-label form-label">Deskripsi Produk</label>
                    <input type="text" class="custom-input form-control" name="deskripsi" id="deskripsi"
                        placeholder="Masukkan Deskripsi Produk"
                        value="{{ $data->deskripsi ? $data->deskripsi : '' }}">
                    @error('deskripsi')
                        <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="imgInput" class="form-label">Masukkan Foto - Foto</label>
                    <input class="form-control" type="file" id="imgInput" name="image[]" multiple>
                    @error('image.*')
                        <div class="text-danger" style="font-size:12px; position:absolute;line-height:2;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="imgShowcase row">
                        @if (isset($data->images))
                            @foreach ($data->images as $img)
                                <img src="{{ asset('storage/image/product/' . $img->image_path) }}" alt=""
                                    class="img-default-product">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">
        Kirim
    </button>
</form>

@push('scripts')
    <script type="text/javascript" src="/assets/admin/js/datetime.js"></script>
    <script type="text/javascript" src="/assets/admin/js/imgShow.js"></script>
@endpush
