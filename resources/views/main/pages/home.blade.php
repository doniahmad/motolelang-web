@extends('main.layouts.master')
@section('title', 'Home')


<div id="" class="container konten">
    <div class="row mb-5">
        @include('main.components.bannerHome')
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <img src="/assets/main/img/tanya_result.webp" width="80%">
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="mt-4 ps-5">
                <h4 class="mb-3 bold">Apasih MOTO Lelang?</h4>
                <p>
                    MOTO Lelang adalah balai lelang sepeda motor yang memiliki visi untuk menjadi wadah
                    jual beli kendaraan paling bisa diandalkan di Indonesia.
                </p>
                <p>
                    Kami selalu menjamin keamanan barang lelang dan juga keaslian barang lelang. Hal itu
                    bertujuan agar proses pelelangan berjalan lancar dan keamanan bagi pembeli (bidder) terjamin.
                </p>
                {{-- <button type="button" class="btn-ikut">Ikut Lelang <span class="ms-1"><i
                                class="fa-solid fa-arrow-right"></i></span></button> --}}
                <a href="about" class="btn-ikut text-decoration-none">Info Lengkap <span class="ms-auto"><i
                            class="fa-solid fa-arrow-right"></i></span></a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="mt-5 pt-5 text-center">
        <h4 class="bold">Gimana Caranya Ikut Lelang?</h4>
        <h6 class="mt-3 semi-bold">Sebelum mengikuti lelang, peserta diwajibkan<br>
            membaca dan memahami peraturan dan cara lelang.</h6>
    </div>
    <div id="caraIkutLelang" class="container d-flex border my-5">
        <div class="row justify-content-md-center mt-5 img-center text-center py-5">
            <div class="col-lg-2">
                <img src="/assets/main/img/Sign up-amico.svg" alt="buat akun">
                <p class="mt-3">Buat Akun Terlebih Dahulu</p>
            </div>
            <div class="col-lg-2">
                <img src="/assets/main/img/Customer Survey-amico.svg" alt="Isi Profil">
                <p class="mt-3">Isi Data Diri DI Menu Profil</p>
            </div>
            <div class="col-lg-2">
                <img src="/assets/main/img/Choose-rafiki.svg" alt="">
                <p class="mt-3">Pilih Pelelangan Yang ingin Anda Ikuti</p>
            </div>
            <div class="col-lg-2 col-sm-6">
                <img src="/assets/main/img/Gaming-bro.svg" alt="">
                <p class="mt-3">Tentukan Username Rahasia Untuk Masuk Lelang</p>
            </div>
            <div class="col-lg-2">
                <img src="/assets/main/img/Done-rafiki.svg" alt="">
                <p class="mt-3">Selamat Anda Sudah Memasuki Pelelangan</p>
            </div>
        </div>
    </div>

</div>

<div class="container">
    @include('main.components.lagiRame')
</div>

<div class="d-flex justify-content-center mt-5">
    <a href="{{ route('lelang.index') }}" class="btn-ikut text-decoration-none"><span class="px-4">Temukan
            lainnya</span></a>
</div>
</div>
</div>
