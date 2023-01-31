@extends('Main.layouts.master')
@section('title', 'Lelang Saya')

<div id="lelangSaya" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <h4>Lelang Saya</h4>
        </div>
        <hr>
        <div class="container">
            <div id="toggleLelangSaya" class="my-3 btn-lelang">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('lelang.lelangSaya') }}" class="text-reset text-decoration-none">
                            <div class="bg-primer text-light text-center border-lelangSaya">
                                <p class="py-2">Lelang Saya</p>
                            </div>
                        </a>

                    </div>
                    <div class="col-6">
                        <a href="{{ route('lelang.pembayaran') }}" class="text-reset text-decoration-none">
                            <div class="bg-white text-center border-pembayaran">
                                <p class="py-2">Pembayaran</p>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                @include('main.components.filterLelang')
            </div>

            <div id="kontenLelangSaya" class="col-10">
                <div class="bg-white d-flex align-items-center box-shadow-santuy mb-4">
                    <div class="img-lelang">
                        <img src="/assets/main/img/unitedemotor_result.webp" alt="" srcset="">
                    </div>

                    <div id="titleLelangSaya" class="">
                        <h5>United E-Motor T1800</h5>
                        <div class="selesai mt-4">
                            <p class="text-center">Selesai</p>
                        </div>
                    </div>

                    <div id="infoLelangSaya" class="">
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

                    <div id="btnLelangSaya" class="">
                        <div class="text-center text-reset text-decoration-none">
                            <a class="btn detail my-2">
                                Detail Kendaraan
                            </a>
                            <a href="" class="btn bayar text-light my-2">
                                Bayar
                            </a>
                        </div>

                    </div>

                </div>

                <div class="bg-white d-flex align-items-center box-shadow-santuy">
                    <div class="img-lelang">
                        <img src="/assets/main/img/unitedemotor_result.webp" alt="" srcset="">
                    </div>

                    <div id="titleLelangSaya" class="">
                        <h5>Beat 2021</h5>
                        <div class="selesai mt-4">
                            <p class="text-center">Selesai</p>
                        </div>
                    </div>

                    <div id="infoLelangSaya" class="">
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

                    <div id="btnLelangSaya" class="">
                        <div class="text-center">
                            <div class="btn detail my-2">
                                Detail Kendaraan
                            </div>
                            <div class="btn bayar text-light my-2">
                                Bayar
                            </div>
                        </div>

                    </div>

                </div>

            </div>



        </div>

    </div>

</div>
</div>
