@extends('Main.layouts.master')
@section('title', 'Galeri Lelang')

<div id="lelang" class="konten-2">
    <div class="px-5">
        <div class="row">
            <div class="col-2">
                @include('main.components.filterLelang')
            </div>

            <div class="col-10">
                <div class="container">
                    <h4>Galeri Lelang</h4>
                    <hr style="border: 1px solid black">
                </div>
                <div class="container">
                    <div id="cardLelang" class="mt-5 d-flex justify-content-between">
                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="lelang/detail">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/unitedemotor_result.webp" alt="United-e-motor"
                                                srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>United E-Motor T1800</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 10.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/yamaha-xsr-155_result.webp" alt="xsr-155"
                                                srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>Yamaha XSR 155</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 15.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/beat-2021_result.webp" alt="United-e-motor"
                                                srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>Beat 2021</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 4.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/beat-2019-blue_result.webp" alt="United-e-motor"
                                                srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>Beat 2019</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 3.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container">
                    <div id="cardLelang" class="mt-5 d-flex justify-content-between">
                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/unitedemotor_result.webp" alt="United-e-motor"
                                                width="100%" srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>United E-Motor T1800</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 10.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/unitedemotor_result.webp" alt="United-e-motor"
                                                width="100%" srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>United E-Motor T1800</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 10.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/unitedemotor_result.webp" alt="United-e-motor"
                                                width="100%" srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>United E-Motor T1800</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 10.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 17rem;">
                            <div class="card">
                                <a class="text-reset text-decoration-none" href="{{ route('lelang.detail') }}">
                                    <div class="">
                                        <div class="">
                                            <img src="/assets/main/img/unitedemotor_result.webp" alt="United-e-motor"
                                                width="100%" srcset="">
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <h6>United E-Motor T1800</h6>
                                            </div>
                                            <div class="d-flex pt-2 align-items-center">
                                                <h6 class="my-auto">Rp. 10.000.000</h6>
                                                <div class="ms-auto ">
                                                    <i class="fa-regular fa-clock"></i>
                                                    <span>10 Hari</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>


            </div>
        </div>
    </div>


</div>
