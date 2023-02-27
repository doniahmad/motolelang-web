<form method="{{ $method }}" action="{{ $path }}" id="form-input-user" enctype="multipart/form-data">
    @csrf

    <div class="foto-user mb-5 mt-3">
        <div id="adminimgUserInput" class="d-flex">
            <div class="mx-auto">
                <label for="input-file-user">
                    <div class="image-section d-flex">
                        <div class="label-img-preview text-secondary d-flex flex-column text-center my-10">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>
                                Masukkan Foto {{ $value }}
                            </span>
                        </div>
                        <img id="user-img-preview" alt="">
                    </div>
                </label>
            </div>
            <input type="file" id="input-file-user" name="photo" onchange="loadFile(event)" hidden>
            {{-- <div class="caption">
                <label id="btnUbahFoto" for="input-file-user" class="btn btn-outline-secondary text-light">Ganti
                    Foto
                </label>
            </div> --}}
        </div>
    </div>

    <div class="row">
        <div class="mb-4 col-6">
            <label for="nama-user" class="custom-label form-label">Nama {{ $value }}</label>
            <input name="name" type="text" class="custom-input form-control" id="nama-user"
                placeholder="Masukkan Nama {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="" class="custom-label form-label">Email {{ $value }}</label>
            <input name="email" type="text" class="custom-input form-control" id="email-user"
                placeholder="Masukkan Email {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="pass-user" class="custom-label form-label">Password {{ $value }}</label>
            <input name="password" type="password" class="custom-input form-control" id="pass-user"
                placeholder="Masukkan Password {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="hp-user" class="custom-label form-label">Handphone {{ $value }}</label>
            <input name="handphone" type="text" class="custom-input form-control" id="hp-user"
                placeholder="Masukkan No.Handphone {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="tempat-lahir-user" class="custom-label form-label">Tempat Lahir {{ $value }}</label>
            <input name="birth_place" type="text" class="custom-input form-control" id="tempat-lahir-user"
                placeholder="Masukkan Tempat Lahir {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="tanggal-lahir-user" class="custom-label form-label">Tanggal Lahir {{ $value }}</label>
            <input name="birth_date" type="date" class="custom-input form-control" id="tanggal-lahir-user"
                placeholder="Masukkan Tanggal Lahir {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="alamat-user" class="custom-label form-label">Alamat {{ $value }}</label>
            <input name="address" type="text" class="custom-input form-control" id="alamat-user"
                placeholder="Masukkan Alamat {{ $value }}" value="" required>
        </div>
        <div class="mb-4 col-6">
            <label for="kelamin-user" class="custom-label form-label">Kelamin {{ $value }}</label>
            <select name="gender" id="kelamin-user" class="custom-input form-control" required>
                <option disabled selected>Pilih Kelamin</option>
                <option value="pria" {{ isset($data->gender) == 'pria' ? 'selected' : '' }}>Pria</option>
                <option value="wanita" {{ isset($data->gender) == 'wanita' ? 'selected' : '' }}>Wanita</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100 h-2 mt-2 mb-4">
        Kirim
    </button>
</form>

@push('scripts')
    <script type="text/javascript">
        function loadFile(event) {
            var image = document.getElementById("user-img-preview");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
