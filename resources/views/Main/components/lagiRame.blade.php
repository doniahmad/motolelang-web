<div class="container mt-5 text-center">
    <h4 class="bold">Lelang Yang Sedang Berlangsung</h4>
</div>
<div id="lagiRame" class="container d-flex">
    <div class="container">
        <div class="row">
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
                <div class="col-md-4 col-sm-6 d-flex align-items-stretch">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container">
                                <div class="">
                                    <div class="d-flex">
                                        <div class="semi-bold">
                                            <i class="fa-regular fa-clock"></i>
                                            <span>{{ $daysDifference }} Hari</span>
                                        </div>
                                        <div class="ms-auto semi-bold">
                                            <span>{{ $product->auctioneer_count }}</span>
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                    </div>

                                    <div class="py-3 text-center">
                                        <img src="{{ count($product->product->images) ? asset('storage/image/product/' . $product->product->images[0]->image_path) : '' }}"
                                            srcset="">
                                    </div>

                                    <div class="">
                                        <h6 class="bold"></h6>
                                        <p id="desc" class="deskripsi-produk">{{ $product->product->deskripsi }}
                                        </p>
                                    </div>
                                    <div class="d-flex pt-2 semi-bold">
                                        <h6>Penawaran Tertinggi</h6>
                                        <h6 class="ms-auto">
                                            {{ currency_IDR(count($product->offer) ? $bestOffer->offer : $product->product->harga_awal) }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
