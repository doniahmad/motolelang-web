@extends('Main.layouts.master')
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
            <div class="col-7">
                @isset($data)
                    <div class="container d-flex align-items-center">
                        <div id="kontenTitlePembayaran" class="bg-white d-flex align-items-center box-shadow-santuy">
                            <div class="img-lelang">
                                <img src="{{ asset('storage/image/product/' . $data->auctioneer->auction->product->img_url) }}"
                                    alt="" srcset="">
                            </div>
                            <div id="infoPembayaran" class="">
                                <table class="table table-borderless">
                                    <tbody class="">
                                        <tr>
                                            <td>Tanggal Pemutusan</td>
                                            <td>:</td>
                                            <td>{{ $data->auctioneer->auction->exp_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tagihan</td>
                                            <td>:</td>
                                            <td>Rp. {{ $data->invoice }}</td>
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
            <div class="col-5">
                <div id="tagihan" class="">
                    <div class="bg-white box-shadow-santuy">
                        <div class="p-4">
                            <h5 class="color-primer">Tagihan</h5>
                            <hr>
                            <div class="d-flex">
                                <p>Harga Kemenangan</p>
                                <p class="ms-auto">Rp. 13.113.002</p>
                            </div>
                            <div class="d-flex">
                                <p>Biaya Pengiriman</p>
                                <p class="ms-auto">Rp. 100.000</p>
                            </div>
                            <hr>
                            <div class="dropdown">

                                <select class="form-select py-1 px-2" id="SelectPengiriman"
                                    aria-label="Default select example">
                                    <option selected disabled>Pilih Cara Pengambilan
                                    </option>
                                    <option value="1">Ambil di tempat</option>
                                    <option value="2" class="">Kirim</option>
                                </select>

                            </div>
                            <hr>
                            <div class="d-flex align-items-center">
                                <h5>Total Tagihan</h5>
                                <h5 class="ms-auto">Rp. 0</h5>
                            </div>
                            <div class="my-3">
                                <a href="#" class="btn btn-primer" data-bs-toggle="modal"
                                    data-bs-target="#modalPembayaran">Bayar</a>
                            </div>
                        </div>
                    </div>
                </div>
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
@endpush
