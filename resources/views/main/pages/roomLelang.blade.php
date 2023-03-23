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
    
    $countdownDate = Carbon\Carbon::parse($data->exp_date); // set countdown date
    $now = Carbon\Carbon::now(); // get current date and time
    $diff = $countdownDate->diff($now); // calculate the difference between countdown date and current date and time
@endphp

@if ($now > $countdownDate)
    <script>
        window.location.href = '/lelang';
    </script>
@endif

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
                <h6 class="ms-auto"">
                    <span id="countdown"></span>
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
                        @if (!count($bestOffer))
                            <div class="text-center text-secondary text-uppercase"
                                style="font-size:24px; font-weight: 500;">
                                Kosong
                            </div>
                        @endif
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
                    <form method="POST" action="{{ route('lelang.offer') }}">
                        @csrf
                        @if (isset($currentAuctioneer->offer))
                            <input type="number"
                                value="{{ $data->kelipatan_bid + ($num1BestOffer !== null ? $num1BestOffer->offer : $data->product->harga_awal) }}"
                                name="offer" id="inputPenawaran" hidden>
                            <input type="text" hidden name="current_offer_id"
                                value="{{ $currentAuctioneer->offer->offer_id }}">
                            <input type="text" hidden name="new_offer" value="1">
                        @else
                            <input type="number"
                                value="{{ $data->kelipatan_bid + ($num1BestOffer !== null ? $num1BestOffer->offer : $data->product->harga_awal) }}"
                                name="offer" id="inputPenawaran" hidden>
                        @endif
                        <input type="text" name="id_auction" class="form-control" hidden
                            value="{{ $data->auction_id }}" />
                        <input type="text" name="id_auctioneer" class="form-control" hidden
                            value="{{ $currentAuctioneer->auctioneer_id }}" />
                        <input type="text" name="token_lelang" class="form-control" hidden
                            value="{{ $data->token }}" />
                        <button type="submit" class="btn btn-pelelangan bg-color-primer text-light mt-3">BID
                            +{{ currency_IDR($data->kelipatan_bid) }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('main.modal.modalInputPenawaran')

<script>
    // Set the date we're counting down to
    // let countDownDate = new Date("{{ $diff->format('M d, Y H:i:s') }}").getTime();

    // Update the count down every 1 second
    // let x = setInterval(function() {

    //     // Get today's date and time
    //     let now = new Date().getTime();

    //     // Find the distance between now and the count down date
    //     let distance = countDownDate - now;

    //     // Time calculations for days, hours, minutes and seconds
    //     let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //     let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //     let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //     // Display the result in the element with id="countdown"
    //     document.getElementById("countdown").innerHTML = "Days: " + days + " Hours: " + hours + " Minutes: " +
    //         minutes + " Seconds: " + seconds;

    //     // If the count down is finished, write some text
    //     if (distance < 0) {
    //         clearInterval(x);
    //         document.getElementById("countdown").innerHTML = "EXPIRED";
    //     }
    // }, 1000);
    CountDownTimer("{{ $data->exp_date }}", 'countdown');

    function CountDownTimer(dt, id) {
        let end = new Date(dt);
        let _second = 1000;
        let _minute = _second * 60;
        let _hour = _minute * 60;
        let _day = _hour * 24;
        let timer;

        function showRemaining() {
            let now = new Date();
            let distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = 'Pelelangan Telah Berakhir';
                return;
            }
            let days = Math.floor(distance / _day);
            let hours = Math.floor((distance % _day) / _hour);
            let minutes = Math.floor((distance % _hour) / _minute);
            let seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = 'Selesai Dalam ';
            if (days !== 0) {
                document.getElementById(id).innerHTML += days + 'h ';
            };

            if (hours !== 0) {
                document.getElementById(id).innerHTML += hours + 'j ';
            };

            if (minutes !== 0) {
                document.getElementById(id).innerHTML += minutes + 'm ';
            };

            document.getElementById(id).innerHTML += seconds + 'd';
            // document.getElementById(id).innerHTML += '<h2>TUGAS BELUM BERAKHIR</h2>';
        }
        timer = setInterval(showRemaining, 1000);
    }
</script>
