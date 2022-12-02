@extends('layouts.master')
@section('title', 'Home')

<div class="container konten">
    <div class="row mb-5">
        <div class="container container-banner col-lg-6 d-flex">
            <div class="container bg-banner">
                <div class="banner-left">
                    <h1 class="mb-3 judul-banner">Temukan Berbagai Jenis Motor</h1>
                    {{-- <button type="button" class="btn-ikut">Ikut Lelang <span class="ms-1"><i
                                class="fa-solid fa-arrow-right"></i></span></button> --}}
                    <a href="lelang" class="btn-ikut text-decoration-none">Ikut Lelang <span class="ms-1"><i
                                class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 3"></button>

                </div>
                <div class="carousel-inner ps-5">
                    <div class="carousel-item active">
                        <img src="/assets/img/beat-2019-blue_result.webp" class="d-block w-100" alt="beat 2021 biru">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/beat-2019-blue_result.webp" class="d-block w-100" alt="beat 2021 biru">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/beat-2019-blue_result.webp" class="d-block w-100" alt="beat 2021 biru">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/beat-2019-blue_result.webp" class="d-block w-100" alt="beat 2021 biru">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/beat-2019-blue_result.webp" class="d-block w-100" alt="beat 2021 biru">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="/assets/img/tanya_result.webp" alt="why?" width="80%">
            </div>

            <div class="col-md-6">
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
                    <a href="about" class="btn-ikut text-decoration-none">Info Lengkap <span class="ms-1"><i
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
        <div class="container d-flex border my-5">
            <div class="row justify-content-md-center mt-5 img-center text-center py-5">
                <div class="col-2">
                    <img src="/assets/img/Dayflow-Sitting1.svg" alt="buat akun" width="100%">
                    <p class="mt-3">Buat Akun Terlebih Dahulu</p>
                </div>
                <div class="col-2">
                    <img src="/assets/img/Croods-Chart1.svg" alt="Isi Profil" width="100%">
                    <p class="mt-3">Isi Data Diri DI Menu Profil</p>
                </div>
                <div class="col-2">
                    <img src="/assets/img/Hands-Point1.svg" alt="" width="100%">
                    <p class="mt-3">Pilih Pelelangan Yang ingin Anda Ikuti</p>
                </div>
                <div class="col-2">
                    <img src="/assets/img/HappyBunch-Desk1.svg" alt="" width="100%">
                    <p class="mt-3">Tentukan Username Rahasia Untuk Masuk Lelang</p>
                </div>
                <div class="col-2">
                    <img src="/assets/img/BigShoes-DynamicPose1.svg" alt="" width="100%">
                    <p class="mt-3">Selamat Anda Sudah Memasuki Pelelangan</p>
                </div>
            </div>
        </div>

    </div>



    <div class="container">
        <div class="container mt-5 text-center">
            <h4 class="bold">Yang Lagi Rame</h4>
        </div>
        <div class="container d-flex">
            <div class="container card-day">
                <div class="row">
                    <div class="col-4">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="container">
                                    <div class="">
                                        <div class="d-flex">
                                            <div class="semi-bold">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>10 Hari</span>
                                            </div>
                                            <div class="ms-auto semi-bold">
                                                <span>20</span>
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </div>

                                        <div class="">
                                            <img src="/assets/img/yamaha-r15_result.webp" alt="Yamaha R15"
                                                width="100%" srcset="">
                                        </div>

                                        <div class="">
                                            <h6 class="bold">Yamaha R15</h6>
                                            <p class="deskripsi-produk">Yamaha YZF-R15, sering disebut juga sebagai
                                                Yamaha R15, adalah sebuah
                                                sepeda
                                                motor sport bermesin 150 cc yang diperkenalkan tahun 2008 di India oleh
                                                Yamaha. Pada bulan...</p>
                                        </div>
                                        <div class="d-flex pt-2 semi-bold">
                                            <h6>Penawaran Tertinggi</h6>
                                            <h6 class="ms-auto">Rp. 35.000.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="container">
                                    <div class="">
                                        <div class="d-flex">
                                            <div class="semi-bold">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>10 Hari</span>
                                            </div>
                                            <div class="ms-auto semi-bold">
                                                <span>20</span>
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </div>

                                        <div class="">
                                            <img src="/assets/img/yamaha-r15_result.webp" alt="Yamaha R15"
                                                width="100%" srcset="">
                                        </div>

                                        <div class="">
                                            <h6 class="bold">Yamaha R15</h6>
                                            <p class="deskripsi-produk">Yamaha YZF-R15, sering disebut juga sebagai
                                                Yamaha R15, adalah sebuah
                                                sepeda
                                                motor sport bermesin 150 cc yang diperkenalkan tahun 2008 di India oleh
                                                Yamaha. Pada bulan...</p>
                                        </div>
                                        <div class="d-flex pt-2 semi-bold">
                                            <h6>Penawaran Tertinggi</h6>
                                            <h6 class="ms-auto">Rp. 35.000.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="container">
                                    <div class="">
                                        <div class="d-flex">
                                            <div class="semi-bold">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>10 Hari</span>
                                            </div>
                                            <div class="ms-auto semi-bold">
                                                <span>20</span>
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </div>

                                        <div class="">
                                            <img src="/assets/img/yamaha-r15_result.webp" alt="Yamaha R15"
                                                width="100%" srcset="">
                                        </div>

                                        <div class="">
                                            <h6 class="bold">Yamaha R15</h6>
                                            <p class="deskripsi-produk">Yamaha YZF-R15, sering disebut juga sebagai
                                                Yamaha R15, adalah sebuah
                                                sepeda
                                                motor sport bermesin 150 cc yang diperkenalkan tahun 2008 di India oleh
                                                Yamaha. Pada bulan...</p>
                                        </div>
                                        <div class="d-flex pt-2 semi-bold">
                                            <h6>Penawaran Tertinggi</h6>
                                            <h6 class="ms-auto">Rp. 35.000.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
