@extends('Main.layouts.master')
@section('title', $data->nama_product)

@php
    $checkIfMemberAuction = [];
    
    if (auth()->user() !== null) {
        $checkIfMemberAuction = array_filter($data->auction->auctioneer, function ($auctioneer) {
            return $auctioneer->id_user == auth()->user()->user_id;
        });
    }
    
    // dd($data->auction);
    
    $bestOffer = collect($data->auction->offer)
        ->sortByDesc('offer')
        ->first();
    
    dd($ongkir);
@endphp

<div id="detailLelang" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('lelang.index') }}" class="text-dark">
                <span style="height: fit-content"><i class="fa fa-arrow-left fa-lg"></i></span>
            </a>
            <h4 class="ps-3 my-auto">{{ $data->nama_product }}</h4>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-7 mb-5">
                @include('main.components.detailSlider', ['path' => $data->images])
            </div>

            <div class="col-5">
                <div class="container bg-white box-shadow-santuy py-2">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <h6 class="color-primer mb-0">INFOMASI KENDARAAN LELANG</h6>
                            {{-- <span class="ms-auto share-icon"><i class="fa-solid fa-share-nodes"></i></span> --}}
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
                                    <td>{{ $data->auction ? Carbon\Carbon::parse($data->auction->created_at)->format('Y-m-d H:m:s') : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lelang Selesai</td>
                                    <td>:</td>
                                    <td>{{ $data->auction ? $data->auction->exp_date : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Limit</td>
                                    <td>:</td>
                                    <td><Strong>{{ currency_IDR($data->harga_awal) }}</Strong></td>
                                </tr>
                                <tr>
                                    <td>Penawaran Tertinggi</td>
                                    <td>:</td>
                                    <td><Strong>{{ currency_IDR(count($data->auction->offer) ? $bestOffer->offer : 0) }}</Strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Peserta</td>
                                    <td>:</td>
                                    <td>{{ count($data->auction->auctioneer) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if (!count($checkIfMemberAuction))
                            @if (auth()->check())
                                <button type="button" class="btn btn-pelelangan bg-color-primer text-light mt-3"
                                    data-bs-toggle="modal" data-bs-target="#modalInputUsername">Ikut Lelang</button>
                            @else
                                <button type="button" class="btn btn-pelelangan bg-color-primer text-light mt-3"
                                    data-bs-toggle="modal" data-bs-target="#alertBeforeLogin">Ikut Lelang</button>
                            @endif
                        @else
                            <a href="{{ route('lelang.room', ['token' => $data->auction->token]) }}"
                                class="btn btn-pelelangan bg-color-primer text-light mt-3">Masuk
                                Lelang</a>
                        @endif
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

            <h6 class="color-primer mb-0 mt-3 px-5 py-2">DOKUMEN KENDARAAN</h6>
            <div class="row">
                <div class="col-6">
                    <div class="px-5">
                        <table class="table">
                            <tbody class="">
                                <tr>
                                    <td>Nomor Polisi</td>
                                    <td>:</td>
                                    <td>{{ $data->nomor_polisi }}</td>
                                </tr>
                                <tr>
                                    <td>STNK</td>
                                    <td>:</td>
                                    <td>{{ $data->stnk ? 'Ada' : 'Tidak Ada' }}</td>
                                </tr>
                                <tr>
                                    <td>BPKB</td>
                                    <td>:</td>
                                    <td>{{ $data->bpkb ? 'Ada' : 'Tidak Ada' }}</td>
                                </tr>
                                <tr>
                                    <td>Form A</td>
                                    <td>:</td>
                                    <td>{{ $data->form_a ? 'Ada' : 'Tidak Ada' }}</td>
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
                                    <td>{{ $data->masa_stnk }}</td>
                                </tr>
                                <tr>
                                    <td>Faktur</td>
                                    <td>:</td>
                                    <td>{{ $data->faktur ? 'Ada' : 'Tidak Ada' }}</td>
                                </tr>
                                <tr>
                                    <td>Kwitansi Blanko</td>
                                    <td>:</td>
                                    <td>{{ $data->kwitansi_blanko ? 'Ada' : 'Tidak Ada' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="px-5 pb-5">
                <h6 class="color-primer mb-0 mt-3 py-2">DESKRIPSI KENDARAAN</h6>
                <p>{{ $data->deskripsi }}</p>
            </div>


        </div>

    </div>
</div>

</div>

@include('main.modal.modalInputUsername')
@include('main.modal.alertBeforeLogin')
