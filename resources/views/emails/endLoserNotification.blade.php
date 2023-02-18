@component('mail::message')
# Kamu Kalah

<h2>Halo {{ $auctioneer->user->name }}</h2>

Sayang sekali, kamu gagal memenangkan produk <b>{{ $auction->product->nama_product }}</b>. Tapi jangan menyerah karena masih banyak sekali pelelangan yang dapat kamu ikuti.

@endcomponent
