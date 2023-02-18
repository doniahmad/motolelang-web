@component('mail::message')
# Halo, {{ $user->name }}

Kami ingin mengingatkan kepada anda, bahwa pelelangan pada produk <b>{{ $auction->product->nama_product }}</b> akan
segera
berakhir dalam <br>
@component('mail::panel')
<h1>1 JAM LAGI</h1>
@endcomponent

Klik tombol dibawah ini untuk mengetahui lebih detail :
@component('mail::button', ['url' => 'http://127.0.0.1:8000/lelang/room/' . $auction->token])
Lihat Detail
@endcomponent
@endcomponent
