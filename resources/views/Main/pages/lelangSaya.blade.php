@extends('main.layouts.master')
@section('title', 'Lelang Saya')


@php
    $data = auth()
        ->user()
        ->load(['auctioneer.auction.offer', 'auctioneer.offer', 'auctioneer.invoice', 'auctioneer.invoice.pengiriman']);
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
            {{-- <div class="col-2">
                @include('main.components.filterLelang')
            </div> --}}

            <div id="kontenLelangSaya" class="">
                @foreach ($data->auctioneer as $auction)
                    @php
                        $bestOffer = collect($auction->auction->offer)
                            ->sortByDesc('offer')
                            ->first();
                    @endphp

                    @if ($auction->auction->status === 0 && $auction->invoice === null)
                    @else
                        <div class="bg-white d-flex align-items-center box-shadow-santuy mb-4">
                            <div class="d-flex align-items-center mx-5 py-3">
                                <div class="img-lelang">
                                    <img src="{{ asset('storage/image/product/' . $auction->auction->product->images[0]->image_path) }}"
                                        alt="" srcset="">
                                </div>

                                <div id="titleLelangSaya" class="">
                                    <h5>{{ $auction->auction->product->nama_product }}</h5>
                                    <div
                                        class="mt-4 {{ $auction->auction->status ? 'bg-primary text-white' : 'bg-danger text-white' }}">
                                        @if ($auction->invoice)
                                            @if ($auction->invoice->status === 'menunggu_persetujuan')
                                                <p class="text-center text-white bg-warning">
                                                    Sedang Diproses
                                                </p>
                                            @elseif ($auction->invoice->status === 'belum_dibayar')
                                                <p class="text-center text-white bg-secondary">
                                                    Belum Dibayar
                                                </p>
                                            @elseif ($auction->invoice->status === 'dibayar' && $auction->invoice->pengiriman->status === 'diterima')
                                                <p class="text-center text-white bg-success">
                                                    Barang Diterima
                                                </p>
                                            @elseif ($auction->invoice->status === 'dibayar' && $auction->invoice->pengiriman->status === 'perjalanan')
                                                <p class="text-center text-white bg-success">
                                                    Sedang Dikirim
                                                </p>
                                            @elseif ($auction->invoice->status === 'ditolak')
                                                <p class="text-center text-white bg-danger">
                                                    Ditolak
                                                </p>
                                            @endif
                                        @else
                                            <p class="text-center">
                                                Berjalan
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
                                                <td>
                                                    {{ currency_IDR(isset($auction->offer) ? $auction->offer->offer : 0) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Penawaran Tertinggi</td>
                                                <td>:</td>
                                                <td>{{ currency_IDR(count($auction->auction->offer) ? $bestOffer->offer : 0) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div id="btnLelangSaya" class="mx-5">
                                    <div class="text-center text-reset text-decoration-none">
                                        <a class="btn detail my-2"
                                            href="{{ route('lelang.detail', ['param' => $auction->auction->product->product_slug]) }}">
                                            Detail Kendaraan
                                        </a>
                                        @if ($auction->invoice === null)
                                            <a href="{{ route('lelang.room', ['token' => $auction->auction->token]) }}"
                                                class="btn btn-primary text-light my-2">
                                                Masuk Pelelangan
                                            </a>
                                        @else
                                            @if ($auction->invoice->status === 'dibayar')
                                                <button type="button" class="btn btn-success text-light my-2" disabled>
                                                    Sudah Dibayar
                                                </button>
                                            @elseif ($auction->invoice->status === 'ditolak')
                                                <a href="{{ route('lelang.pembayaran', ['token' => $auction->invoice->kode_pembayaran]) }}"
                                                    class="btn btn-primary text-light my-2">
                                                    Bayar Kembali
                                                </a>
                                            @else
                                                <a href="{{ route('lelang.pembayaran', ['token' => $auction->invoice->kode_pembayaran]) }}"
                                                    class="btn btn-primary text-light my-2">
                                                    Bayar
                                                </a>
                                            @endif
                                        @endif
                                    </div>
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
