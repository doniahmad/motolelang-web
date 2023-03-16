@component('mail::message')
# Pembayaran kamu telah diterima!

<h2>Halo {{ $auctioneer->user->name }}</h2>

Pembayaran anda telah diterima oleh admin, pada product :
@component('mail::panel')
Nama Product : {{ $auctioneer->auction->product->nama_product }}
<br>
@endcomponent

Barang anda akan segera dikirim, untuk melihat lebih lengkapnya silahkan tekan tombol berikut.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/lelang/lelang-saya'])
Selengkapnya
@endcomponent
@endcomponent
