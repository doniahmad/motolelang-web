@extends('Main.layouts.master')
{{-- @dd($ongkir) --}}
@section('title', 'Lelang Saya')


<div id="pembayaran" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <h4>Pembayaran</h4>
        </div>
        <hr class="mb-4">
        <div class="container">
            {{-- <div id="toggleLelangSaya" class="my-3 btn-lelang">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('lelang.lelangSaya') }}" class="text-reset text-decoration-none">
                            <div class="bg-white text-center border-lelangSaya">
                                <p class="py-2">Lelang Saya</p>
                            </div>
                        </a>

                    </div>
                    <div class="col-6">
                        <a href="{{ route('lelang.pembayaran') }}" class="text-reset text-decoration-none">
                            <div class="bg-primer text-light text-center border-pembayaran">
                                <p class="py-2">Pembayaran</p>
                            </div>
                        </a>

                    </div>
                </div>
            </div> --}}
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
                    <br>
                    <b>Alasan Penolakan : {{ isset($data->alasan_penolakan) ? $data->alasan_penolakan : '' }}</b>
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
                                    <p class="ms-auto"> <span id="selected">Rp. 0</span></p>
                                </div>
                                <hr>
                                <div class="dropdown">

                                    {{-- <select id="selectPengambilan" class="form-select py-1 px-2"
                                        onchange="enablePengiriman(this)" aria-label="Default select example">
                                        <option selected disabled>Pilih Cara Pengambilan
                                        </option>
                                        <option value="0">Ambil di tempat</option>
                                        <option value="1" class="">Kirim</option>
                                    </select> --}}

                                    {{-- <select id="selectPengiriman" class="form-select mt-3 py-1 px-2" onchange=""
                                        aria-label="Default select example">
                                        <option class="" value="0">Pilih Daerah Pengiriman
                                        </option>
                                        <option value="" disabled="disabled">----------------------</option>
                                        <option value="1">Kabupaten Banjarnegara</option>
                                        <option value="2" class="">Kabupaten Banyumas</option>
                                        <option value="3" class="">Kabupaten Batang</option>
                                        <option value="4" class="">Kabupaten Blora</option>
                                        <option value="5" class="">Kabupaten Boyolali</option>
                                        <option value="6" class="">Kabupaten Brebes</option>
                                        <option value="7" class="">Kabupaten Cilacap</option>
                                        <option value="8" class="">Kabupaten Demak</option>
                                        <option value="9" class="">Kabupaten Grobogan</option>
                                        <option value="10" class="">Kabupaten Jepara</option>
                                        <option value="11" class="">Kabupaten Karanganyar</option>
                                        <option value="12" class="">Kabupaten Kebumen</option>
                                        <option value="13" class="">Kabupaten Kendal</option>
                                        <option value="14" class="">Kabupaten Klaten</option>
                                        <option value="15" class="">Kabupaten Kudus</option>
                                        <option value="16" class="">Kabupaten Magelang</option>
                                        <option value="17" class="">Kabupaten Pati</option>
                                        <option value="18" class="">Kabupaten Pekalongan</option>
                                        <option value="19" class="">Kabupaten Pemalang</option>
                                        <option value="20" class="">Kabupaten Purbalingga</option>
                                        <option value="21" class="">Kabupaten Purworejo</option>
                                        <option value="22" class="">Kabupaten Rembang</option>
                                        <option value="23" class="">Kabupaten Semarang</option>
                                        <option value="24" class="">Kabupaten Sragen</option>
                                        <option value="25" class="">Kabupaten Sukoharjo</option>
                                        <option value="26" class="">Kabupaten Tegal</option>
                                        <option value="27" class="">Kabupaten Temanggung</option>
                                        <option value="28" class="">Kabupaten Wonogiri</option>
                                        <option value="29" class="">Kabupaten Wonosobo</option>
                                        <option value="30" class="">Kota Magelang</option>
                                        <option value="31" class="">Kota Pekalongan</option>
                                        <option value="32" class="">Kota Salatiga</option>
                                        <option value="33" class="">Kota Semarang</option>
                                        <option value="34" class="">Kota Surakarta</option>
                                        <option value="35" class="">Kota Tegal</option>
                                    </select> --}}

                                    <select name="" id="selectKabupaten" onchange="SelectedOngkir(this)"
                                        class="form-select mt-3 py-1 px-2" aria-label="Default select example">
                                        <option value="" disabled selected>Pilih Daerah Pengiriman</option>
                                        <option value="" disabled="disabled">----------------------</option>
                                        @foreach ($ongkir as $item)
                                            <option value="{{ $item->ongkir }}" ongkir-id="{{ $item->ongkir_id }}">
                                                {{ $item->nama_daerah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <h5>Total Tagihan</h5>
                                    <h5 class="ms-auto" id="jumlah-tagihan" class="jumlah-tagihan">
                                        {{ currency_IDR($data->invoice) }}</h5>
                                </div>
                                <div class="my-3">
                                    <button type="button" class="btn btn-primer" id="btn-bayar-tagihan"
                                        data-bs-toggle="modal" data-bs-target="#modalPembayaran" disabled>Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
</div>
@isset($data)
    @include('main.modal.modalPembayaran')
@endisset



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
    </script>
@endpush
