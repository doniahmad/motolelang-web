@extends('main.layouts.master')
@section('title', 'Galeri Lelang')

<div id="lelang" class="konten-2">
    <div class="px-5">
        <div class="row">
            {{-- <div class="col-2">
                @include('main.components.filterLelang')
            </div> --}}

            <div class="">
                <div class="container">
                    <h4>Galeri Lelang</h4>
                    <hr style="border: 1px solid black">
                </div>
                <div class="container">
                    <div class="row" style="border: none; height:auto;">
                        @foreach ($data as $product)
                            @php
                                $bestOffer = collect($product->offer)
                                    ->sortByDesc('offer')
                                    ->first();
                                
                                // Mengambil tanggal saat ini
                                $currentDate = Carbon\Carbon::now();
                                
                                // Mengambil tanggal yang diinginkan
                                $desiredDate = Carbon\Carbon::parse($product->exp_date);
                                
                                // Menghitung selisih hari antara tanggal saat ini dan tanggal yang diinginkan
                                $daysDifference = $currentDate->diffInDays($desiredDate);
                                
                            @endphp
                            @if ($product->status === 0)
                                <div class="col-3 mt-4" style="border:none;">
                                    <div class="col-lelang card">
                                        <a class="text-reset text-decoration-none"
                                            href="{{ route('lelang.detail', $product->product->product_slug) }}">
                                            <div class="card-container">
                                                <div class="img-card-lelang">
                                                    <img src="{{ count($product->product->images) ? asset('storage/image/product/' . $product->product->images[0]->image_path) : '' }}"
                                                        width="100%" srcset="">
                                                    @if ($currentDate > $desiredDate)
                                                        <div id="auctionClosedOverlay"
                                                            class="auction-closed-overlay text-center">
                                                            <img src="/assets/main/img/terjual.png" alt=""
                                                                srcset="">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card-lelang d-flex flex-column align-items-stretch p-3">
                                                    <div class="">
                                                        <div class="titleLelang">
                                                            <h6 class="">{{ $product->product->nama_product }}
                                                            </h6>
                                                        </div>
                                                    </div>

                                                    <div class="card-lelang-bot d-flex ">
                                                        <h6 id="" class="my-auto">
                                                            {{ currency_IDR(count($product->offer) ? $bestOffer->offer : $product->product->harga_awal) }}
                                                        </h6>
                                                        <div class="ms-auto ">
                                                            <i class="fa-regular fa-clock"></i>
                                                            <span>{{ $currentDate > $desiredDate ? 'Selesai' : '0 Hari' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-3 mt-4" style="border:none;">
                                    <div class="col-lelang card">
                                        <a class="text-reset text-decoration-none"
                                            href="{{ route('lelang.detail', $product->product->product_slug) }}">
                                            <div class="card-container">
                                                <div class="img-card-lelang">
                                                    <img src="{{ count($product->product->images) ? asset('storage/image/product/' . $product->product->images[0]->image_path) : '' }}"
                                                        width="100%" srcset="">
                                                </div>
                                                <div class="card-lelang d-flex flex-column align-items-stretch p-3">
                                                    <div class="">
                                                        <h6 class="titleLelang">
                                                            {{ $product->product->nama_product }}
                                                        </h6>
                                                    </div>
                                                    <div class="card-lelang-bot d-flex ">
                                                        <h6 class="my-auto">
                                                            {{ currency_IDR(count($product->offer) ? $bestOffer->offer : $product->product->harga_awal) }}
                                                        </h6>
                                                        <div class="ms-auto ">
                                                            <i class="fa-regular fa-clock"></i>
                                                            <span>{{ $daysDifference > 0 ? $daysDifference . ' Hari' : 'Hari Ini' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- <div class="container mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            @if ($data->prev_page_url != null)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $data->prev_page_url }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            @endif
                            @for ($i = 1; $i <= $data->last_page; $i++)
                                <li class="page-item"><a class="page-link" href="">{{ $i }}</a></li>
                            @endfor
                            @if ($data->next_page_url != null)
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>

                </div> --}}
                <div class="d-flex justify-content-center mt-5">
                    {!! $data->links() !!}
                </div>

            </div>
        </div>
    </div>
</div>
