@extends('main.layouts.master')
@section('title', 'Pembayaran')


<div id="pembayaran" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <h4>Pembayaran</h4>
        </div>
        <hr class="mb-4">
        <div class="container">
        </div>

        <div id="kontenPembayaran" class="row">
            <div class="col-md-7 col-sm-6">
                @isset($data)
                    <div class="container d-flex align-items-center">
                        <div id="kontenTitlePembayaran" class="bg-white d-flex align-items-center box-shadow-santuy p-3">
                            <div class="img-lelang">
                                <img src="{{ asset('storage/image/product/' . $data->auctioneer->auction->product->images[0]->image_path) }}"
                                    alt="" srcset="">
                            </div>
                            <div id="infoPembayaran" class="">
                                <table class="table table-borderless">
                                    <tbody class="">
                                        <tr>
                                            <td>Pelelangan Selesai</td>
                                            <td>:</td>
                                            <td>{{ $data->auctioneer->auction->exp_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga Kemenangan</td>
                                            <td>:</td>
                                            <td>{{ currency_IDR($data->invoice) }}</td>
                                        </tr>
                                        <tr>
                                            <b>{{ $data->auctioneer->auction->product->nama_product }}</b>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if ($data->status === 'ditolak')
                        <div class="py-3">
                            <div class="container">
                                <div class="d-flex bg-white box-shadow-santuy p-3">
                                    <b>Alasan Penolakan :
                                        {{ isset($data->alasan_penolakan) ? $data->alasan_penolakan : '' }}</b>
                                </div>
                            </div>
                        </div>
                    @endif
                @endisset
            </div>
            <div class="col-md-5 col-sm-6">
                @isset($data)
                    <div id="tagihan" class="">
                        <div class="bg-white box-shadow-santuy">
                            <div class="p-4">
                                <h5 class="color-primer">Tagihan</h5>
                                <hr>
                                <div class="d-flex">
                                    <p>Harga Kemenangan</p>
                                    <p class="ms-auto">{{ currency_IDR($data->invoice) }}</p>
                                </div>
                                <div class="d-flex">
                                    <p>Biaya Pengiriman</p>
                                    <p class="ms-auto" id="tagihan-ongkir">Rp. 0</p>
                                </div>
                                <hr>
                                <div class="dropdown province-dropdown mt-3">
                                    <span>
                                        Pilih Provinsi
                                    </span>
                                    <select name="" id="selectProvinsi" onchange="SelectedProvinsi(this)"
                                        class="form-select mt-1 py-1 px-2" aria-label="Default select example">
                                        <option value="" disabled selected>Pilih Provinsi Pengiriman</option>
                                        <option value="" disabled="disabled">----------------------</option>
                                        @foreach ($dataProvince as $province)
                                            <option value="{{ $province->province_id }}">
                                                {{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="dropdown city-dropdown mt-3" style="display: none">
                                    <span>
                                        Pilih Kota
                                    </span>
                                    <select name="" id="selectKota" onchange="SelectedKota(this)"
                                        class="form-select mt-1 py-1 px-2" aria-label="Default select example">
                                    </select>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <h5>Total Tagihan</h5>
                                    <h5 class="ms-auto" id="jumlah-tagihan" class="jumlah-tagihan">
                                        {{ currency_IDR($data->invoice) }}</h5>
                                </div>
                                <form method="POST" action="{{ route('invoice.bayar') }}">
                                    @csrf
                                    <input id="kode_pembayaran_container" type="text" name="kode_pembayaran"
                                        value="{{ $data->kode_pembayaran }}" hidden>
                                    <input type="integer" name="ongkir" id="ongkir-value" hidden>
                                    <input type="text" name="status" value="menunggu_persetujuan" hidden>
                                    <input type="text" name="alamat_pengiriman" id="alamat-pengiriman" hidden>
                                    <input type="integer" name="gross_amount" id="gross_amount" hidden>
                                    <input type="text" name="user" value="{{ json_encode($data->auctioneer->user) }}"
                                        hidden>
                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primer" id="btn-bayar-tagihan"
                                            data-bs-toggle="modal" data-bs-target="#modalPembayaran" disabled>Bayar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
</div>

@push('scripts')
    <script type="text/javascript" src="/assets/main/js/valueModal.js"></script>
    <script type="text/javascript">
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ""),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

        function SelectedOngkir(val) {
            document.getElementById("selected").innerHTML = formatRupiah(
                val.value,
                "Rp. "
            );

            let ongkir = Number(val.value);
            let sum = ongkir + {!! $data->invoice !!};
            const jumlahTagihan = document.querySelectorAll("#jumlah-tagihan")
            jumlahTagihan.forEach((element, index) => {
                element.innerHTML = formatRupiah(sum,
                    "Rp. "
                );
            });
            document.getElementById('ongkir-value').value = val.options[val.selectedIndex]
                .getAttribute("ongkir-id");

            document.getElementById('btn-bayar-tagihan').removeAttribute('disabled');
        }

        function SelectedProvinsi(val) {
            const citySelect = document.getElementById('selectKota');
            citySelect.parentElement.style.display = 'block';
            fetch('/api/city?province=' + val.value)
                .then(response => response.json())
                .then(data => {
                    // Kosongkan dropdown city dan tambahkan daftar kota yang tersedia
                    citySelect.innerHTML = '<option value="">Pilih Kota Pengiriman</option>';
                    // citySelect.innerHTML = '<option value="" disabled="disabled">----------------------</option>';
                    data.forEach(city => {
                        citySelect.innerHTML += '<option value="' + city.city_id + '">' + city.city_name +
                            '</option>';
                    });

                });
        }

        function SelectedKota(val) {
            const province = document.getElementById('selectProvinsi');
            fetch('/api/cost?destination=' + val.value)
                .then(response => response.json())
                .then(data => {
                    // Penjumlahan Tagihan
                    let sum = data.cost[0].value + {!! $data->invoice !!};

                    // View Tagihan Ongkir
                    document.getElementById('tagihan-ongkir').innerHTML = formatRupiah(data.cost[0].value, 'Rp. ');

                    // Input Ongkir di Modal
                    document.getElementById('ongkir-value').value = data.cost[0].value;
                    document.getElementById('gross_amount').value = sum;
                    document.getElementById('alamat-pengiriman').value = val.options[val.selectedIndex].innerHTML +
                        ',' + province.options[province.selectedIndex]
                        .innerHTML;

                    // Tagihan Semua
                    const jumlahTagihan = document.querySelectorAll("#jumlah-tagihan")
                    jumlahTagihan.forEach((element, index) => {
                        element.innerHTML = formatRupiah(sum,
                            "Rp. "
                        );
                    });

                    document.getElementById('btn-bayar-tagihan').removeAttribute('disabled');

                });
        }
    </script>
@endpush
