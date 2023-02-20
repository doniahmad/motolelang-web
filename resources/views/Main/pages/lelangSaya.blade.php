@extends('Main.layouts.master')
@section('title', 'Lelang Saya')
@php
    $data = auth()
        ->user()
        ->load(['auctioneer.auction', 'auctioneer.offer', 'auctioneer.invoice']);

@endphp

<div id="lelangSaya" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <h4>Lelang Saya</h4>
        </div>
        <hr class="mb-4">
        <div class="container">
            {{-- <div id="toggleLelangSaya" class="my-3 btn-lelang">
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
            </div> --}}
        </div>

        <div class="row">
            <div class="col-2">
                @include('main.components.filterLelang')
            </div>

            <div id="kontenLelangSaya" class="col-10">
                @foreach ($data->auctioneer as $auction)
                    @if ($auction->auction->status === 0 && $auction->invoice === null)
                    @else
                        <div class="bg-white d-flex align-items-center box-shadow-santuy mb-4">
                            <div class="img-lelang">
                                <img src="{{ asset('storage/image/product/' . $auction->auction->product->img_url) }}"
                                    alt="" srcset="">
                            </div>

                            <div id="titleLelangSaya" class="">
                                <h5>{{ $auction->auction->product->nama_product }}</h5>
                                <div class="selesai mt-4 {{ $auction->auction->status ? 'bg-warning' : 'bg-success' }}">
                                    @if ($auction->invoice !== null)
                                        @switch($auction->invoice->status)
                                            @case('menunggu_persetujuan')
                                                <p class="text-center">
                                                    SEDANG DIPROSES
                                                </p>
                                            @break

                                            @case('dibayar')
                                                <p class="text-center">SEDANG DIKIRIM</p>
                                            @break

                                            @case('ditolak')
                                                <p class="text-center">DITOLAK</p>
                                            @break

                                            @default
                                        @endswitch
                                    @else
                                        <p class="text-center"> {{ $auction->auction->status ? 'BERJALAN' : 'SELESAI' }}
                                        </p>
                                    @endif

                                </div>
                            </div>

                            <div id="infoLelangSaya" class="">
                                <table class="table table-borderless">
                                    <tbody class="">
                                        <tr>
                                            <td>Batas Pelelangan</td>
                                            <td>:</td>
                                            <td>{{ $auction->auction->exp_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Penawaran Saya</td>
                                            <td>:</td>
                                            <td>Rp. {{ isset($auction->offer) ? $auction->offer->offer : 0 }}</td>
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
                                    <a href="" class="btn detail my-2"
                                        href="{{ route('lelang.detail', ['param' => $auction->auction->product->product_slug]) }}">
                                        Detail Kendaraan
                                    </a>
                                    {{-- @php
                                    $allUserAuctioneer = auth()->user()->auctioneer;
                                    $allIdAuctioneer = [];
                                    foreach ($allUserAuctioneer as $data) {
                                        $allIdAuctioneer[] += $data->auctioneer_id;
                                    }
                                @endphp --}}
                                    @if ($auction->invoice === null)
                                        <a href="{{ route('lelang.room', ['token' => $auction->auction->token]) }}"
                                            class="btn bayar text-light my-2">
                                            Masuk Pelelangan
                                        </a>
                                    @else
                                        <a href="{{ route('lelang.pembayaran', ['token' => $auction->invoice->kode_pembayaran]) }}"
                                            class="btn bayar text-light my-2">
                                            Bayar
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>



        </div>

    </div>

</div>
</div>
