@extends('Main.layouts.master')
@section('title', 'Lelang')

<div id="detailLelang" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <span style="height: fit-content"><i class="fa fa-arrow-left fa-lg"></i></span>
            <h4 class="ps-3 my-auto">United E-Motor T1800</h4>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-7 mb-5">
                @include('main.components.detailSlider', ['path' => $data->img_url])
            </div>

            <div class="col-5">
                <div class="container bg-white box-shadow-santuy py-2">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="color-primer mb-0 mt-3">INFOMASI KENDARAAN LELANG</h6>
                            <span class="ms-auto share-icon"><i class="fa-solid fa-share-nodes"></i></span>
                        </div>
                        <h5 class="my-2">{{ $data->nama_product }}</h5>
                        <p>Tahun : <strong>2022</strong> </p>
                        <hr style="margin-bottom: -15px!important">
                    </div>
                    <div class="p-3">
                        <table class="table table-borderless">
                            <tbody class="">
                                <tr>
                                    <td>No. Lot</td>
                                    <td>:</td>
                                    <td>00000{{ $data->product_id }}</td>
                                </tr>
                                <tr>
                                    <td>Lelang Mulai</td>
                                    <td>:</td>
                                    <td>{{ Carbon\Carbon::parse($data->auction->created_at)->format('Y-m-d H:m:s') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lelang Selesai</td>
                                    <td>:</td>
                                    <td>{{ $data->auction->exp_date }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Limit</td>
                                    <td>:</td>
                                    <td><Strong>Rp. {{ $data->harga_awal }}</Strong></td>
                                </tr>
                                <tr>
                                    <td>Penawaran Tertinggi</td>
                                    <td>:</td>
                                    <td><Strong>Rp. 13.120.001</Strong></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Peserta</td>
                                    <td>:</td>
                                    <td>9</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-pelelangan bg-color-primer text-light mt-3"
                            data-bs-toggle="modal" data-bs-target="#modalInputUsername">Ikut Lelang</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-5 bg-white box-shadow-santuy">
            <h6 class="color-primer mb-0 mt-3 px-5 pt-5 pb-2">SPESIFIKASI KENDARAAN</h6>
            <div class="row">
                <div class="col-6">
                    <div class="px-5">
                        <table class="table">
                            <tbody class="">
                                <tr>
                                    <td>Merk</td>
                                    <td>:</td>
                                    <td>{{ $data->merk }}</td>
                                </tr>
                                <tr>
                                    <td>Kapasitas Mesin</td>
                                    <td>:</td>
                                    <td>{{ $data->kapasitas_cc }} CC</td>
                                </tr>
                                <tr>
                                    <td>Odometer</td>
                                    <td>:</td>
                                    <td>{{ $data->odometer }} KM</td>
                                </tr>
                                <tr>
                                    <td>Nomor Mesin</td>
                                    <td>:</td>
                                    <td>{{ $data->nomor_mesin }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-6">
                    <div class="px-5">
                        <table class="table">
                            <tbody class="">
                                <tr>
                                    <td>Type</td>
                                    <td>:</td>
                                    <td>{{ $data->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Bahan Bakar</td>
                                    <td>:</td>
                                    <td>{{ $data->bahan_bakar }}</td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td>:</td>
                                    <td>{{ $data->warna }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rangka</td>
                                    <td>:</td>
                                    <td>{{ $data->nomor_rangka }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            @if ($data->document != null)
                <h6 class="color-primer mb-0 mt-3 px-5 py-2">DOKUMEN KENDARAAN</h6>
                <div class="row">
                    <div class="col-6">
                        <div class="px-5">
                            <table class="table">
                                <tbody class="">
                                    <tr>
                                        <td>Nomor Polisi</td>
                                        <td>:</td>
                                        <td>B 3203 UNP</td>
                                    </tr>
                                    <tr>
                                        <td>STNK</td>
                                        <td>:</td>
                                        <td>Ada</td>
                                    </tr>
                                    <tr>
                                        <td>BPKB</td>
                                        <td>:</td>
                                        <td>Ada</td>
                                    </tr>
                                    <tr>
                                        <td>Form A</td>
                                        <td>:</td>
                                        <td>Ada</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="px-5">
                            <table class="table">
                                <tbody class="">
                                    <tr>
                                        <td>Masa Berlaku STNK</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Faktur</td>
                                        <td>:</td>
                                        <td>Ada</td>
                                    </tr>
                                    <tr>
                                        <td>Kwitansi Blanko</td>
                                        <td>:</td>
                                        <td>Tidak Ada</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            <div class="px-5 pb-5">
                <h6 class="color-primer mb-0 mt-3 py-2">DESKRIPSI KENDARAAN</h6>
                <p>United T1800 menggunakan tenaga dari penggerak motor listrik BOSCH 60V1800W dengan rated speed 620
                    rpm,
                    torsi 27 Nm dan tenaga 1.800 W. Kapasitas baterai Lithium yang digunakan adalah 60V 28Ah yang dalam
                    kondisi penuh 100% dapat mencapai kecepatan maksimum 70 km/jam dan jarak tempuh hingga 60 km dengan
                    kecepatan rata-rata pada 50- 60 km/jam pada mode kecepatan normal.</p>
            </div>


        </div>

    </div>
</div>

</div>

@include('main.modal.modalInputUsername')
