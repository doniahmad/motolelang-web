@component('mail::message')
# Kamu Menang

<h2>Halo {{ $auctioneer->auctioneer->user->name }}</h2>

Selamat, anda berhasil memenangkan pelelangan pada product :
@component('mail::panel')
Nama Product : {{ $auction->product->nama_product }}
<br>
Tagihan : {{ $auctioneer->offer }}
@endcomponent

Anda dapat melakukan pembarayan dengan menekan tombol dibawah ini.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/lelang/pembayaran'])
Bayar
@endcomponent
@endcomponent
