@extends('Main.layouts.master')
@section('title', $data->product->nama_product)

@php
    
    $checkIfMemberAuction = array_filter($data->auctioneer, function ($auctioneer) {
        return $auctioneer->id_user == auth()->user()->user_id;
    });
    
    $bestOffer = collect($data->offer)->sortByDesc('offer');
    
    $num1BestOffer = $bestOffer->first();
    
    $currentAuctioneer = current($checkIfMemberAuction);
    
    $i = 1;
@endphp

<div id="roomLelang" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('lelang.detail', ['param' => $data->product->product_slug]) }}" class="text-dark">
                <span style="height: fit-content"><i class="fa fa-arrow-left fa-lg"></i></span>
            </a>
            <h4 class="ps-3 my-auto">Pelelangan {{ $data->product->nama_product }}</h4>
        </div>

        <div class="my-4">
            <h6>Selamat Datang,</h6>
            <div class="d-flex align-items-center">
                <h5 class="color-primer">
                    {{ isset($currentAuctioneer) ? $currentAuctioneer->nama_samaran : 'Null' }}
                </h5>
                <h6 class="ms-auto">Selesai Pada
                    <span>{{ $data ? $data->exp_date : '' }}</span>
                    <span><i class="fa-regular fa-clock"></i></span>
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div id="topPenawar" class="bg-white box-shadow-santuy">
                    <div class="py-4">
                        <h5 class="text-center">TOP PENAWAR</h5>
                    </div>

                    <div id="tableTopPenawar" class="px-4 py-2">
                        <table class="table table-borderless">
                            <tbody class="">
                                @foreach ($bestOffer as $index => $auctioneer)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $auctioneer->auctioneer->nama_samaran }}</td>
                                        <td>{{ currency_IDR($auctioneer->offer ? $auctioneer->offer : 0) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-7">
                <div class="d-flex ">
                    <img src="{{ $data ? asset('storage/image/product/' . $data->product->images[0]->image_path) : '' }}"
                        class="img-pelelangan" alt="" srcset="">
                </div>

                <div id="formKirimPenawaran" class="bg-white text-center p-3 box-shadow-santuy">
                    <p class="">Penawaran Saya</p>
                    <h3 class="">
                        {{ currency_IDR(isset($currentAuctioneer->offer) ? $currentAuctioneer->offer->offer : 0) }}
                    </h3>
                    <button type="button" class="btn btn-pelelangan bg-color-primer text-light mt-3"
                        data-bs-toggle="modal" data-bs-target="#modalInputPenawaran">Kirim
                        Penawaran</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('main.modal.modalInputPenawaran')
