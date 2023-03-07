@extends('Main.layouts.master')
@section('title', 'Galeri Lelang')

@php
    // $startedAuction = array_filter($data, fn($product) => $product->status === 1);
@endphp
{{-- @dd($data) --}}
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
                            @endphp
                            <div class="col-3 mt-4" style="border:none;">
                                <div class="col-lelang card">
                                    <a class="text-reset text-decoration-none"
                                        href="{{ route('lelang.detail', $product->product->product_slug) }}">
                                        <div class="card-container">
                                            <div class="img-card-lelang">
                                                <img src="{{ count($product->product->images) ? asset('storage/image/product/' . $product->product->images[0]->image_path) : '' }}"
                                                    width="100%" srcset="">
                                            </div>
                                            <div class="card-lelang">
                                                <div class="">
                                                    <h6>{{ $product->product->nama_product }}</h6>
                                                </div>
                                                <div class="card-lelang-bot d-flex ">
                                                    <h6 class="my-auto">
                                                        {{ currency_IDR(count($product->offer) ? $bestOffer->offer : $product->product->harga_awal) }}
                                                    </h6>
                                                    <div class="ms-auto ">
                                                        <i class="fa-regular fa-clock"></i>
                                                        <span>1 Hari</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
