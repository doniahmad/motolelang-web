@extends('Main.layouts.master')
{{-- @dd($ongkir) --}}
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
                                    <p class="ms-auto"> <span id="selected">Rp. 0</span></p>
                                </div>
                                <hr>
                                <div class="dropdown">
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
