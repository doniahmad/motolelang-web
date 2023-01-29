@extends('Main.layouts.master')
@section('title', 'Lelang Saya')

<div id="pembayaran" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <h4>Pembayaran</h4>
        </div>
        <hr>
        <div class="container">
            <div id="toggleLelangSaya" class="my-3 btn-lelang">
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
            </div>
        </div>

        <div id="kontenPembayaran" class="row">
            <div class="col-7">
                <div id="titlePembayaran" class="container d-flex align-items-center">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                    <div id="kontenTitlePembayaran" class="bg-white d-flex align-items-center box-shadow-santuy">
                        <div class="img-lelang">
                            <img src="/assets/main/img/unitedemotor_result.webp" alt="" srcset="">
                        </div>
                        <div id="infoPembayaran" class="">
                            <table class="table table-borderless">
                                <tbody class="">
                                    <tr>
                                        <td>Batas Pelelangan</td>
                                        <td>:</td>
                                        <td>12-11-2022 18:23:11</td>
                                    </tr>
                                    <tr>
                                        <td>Penawaran Saya</td>
                                        <td>:</td>
                                        <td>Rp. 13.113.002</td>
                                    </tr>
                                    <tr>
                                        <td>Penawaran Tertinggi</td>
                                        <td>:</td>
                                        <td>Rp. 13.113.002</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div id="tagihan" class="">
                    <div class="bg-white box-shadow-santuy">
                        <div class="p-4">
                            <h5 class="color-primer">Tagihan</h5>
                            <hr>
                            <div class="d-flex">
                                <p>Jumlah barang</p>
                                <p class="ms-auto">0</p>
                            </div>
                            <div class="d-flex">
                                <p>Biaya Pengiriman</p>
                                <p class="ms-auto">-</p>
                            </div>
                            <hr>
                            <div class="dropdown">
                                <button class="d-flex align-items-center btn border" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>Pilih Cara Pengambilan</span>
                                    <i class="fa fa-caret-down ms-auto"></i>
                                </button>
                                <ul class="dropdown-menu px-3" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item " href="#">Ambil Ditempat</a></li>
                                    <li>
                                        <hr class="dropdown-divider my-auto">
                                    </li>
                                    <li><a class="dropdown-item " href="#">Kirim Dengan Eskpedisi</a></li>
                                </ul>
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
@include('main.modal.modalPembayaran')
