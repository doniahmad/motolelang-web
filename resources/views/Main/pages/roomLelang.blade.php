@extends('Main.layouts.master')
@section('title', 'Ruang Lelang')

<div id="roomLelang" class="konten-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <span style="height: fit-content"><i class="fa fa-arrow-left fa-lg"></i></span>
            <h4 class="ps-3 my-auto">Pelelangan United E-Motor T1800</h4>
        </div>

        <div class="my-4">
            <h6>Selamat Datang,</h6>
            <div class="d-flex align-items-center">
                <h5 class="color-primer">ArilPoncoNugroho</h5>
                <h6 class="ms-auto">Selesai Dalam
                    <span>{{ $data->exp_date }}</span>
                    <span><i class="fa-regular fa-clock"></i></span>
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div id="topPenawar" class="bg-white box-shadow-santuy">
                    <div class="py-4">
                        <h5 class="text-center">TOP PENAWAR</h5>
                    </div>

                    <div class="px-4 py-2">
                        <table class="table table-borderless">
                            <tbody class="">
                                <tr>
                                    <td>1.</td>
                                    <td>RajaTidur</td>
                                    <td>Rp. 13.130.001</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>PutraBapak</td>
                                    <td>Rp. 13.130.000</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>MakelarRecehan</td>
                                    <td>Rp. 12.132.002</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>PenggodaDompet</td>
                                    <td>Rp. 12.132.001</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>CopetAngkatBiru</td>
                                    <td>Rp. 12.132.000</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>blackAzuredevil</td>
                                    <td>Rp. 10.450.000</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>MamahMauPermen</td>
                                    <td>Rp. 10.200.000</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>CumaLihat</td>
                                    <td>Rp. 0</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>ArilPoncoNugroho</td>
                                    <td>Rp. 0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-7">
                <div class="d-flex ">
                    <img src="{{ asset('storage/image/product/' . $data->product->img_url) }}" class="img-pelelangan"
                        alt="" srcset="">
                </div>

                <div class="bg-white text-center p-3 box-shadow-santuy ">
                    <p class="">Penawaran Saya</p>
                    <h3 class="">Rp. 0</h3>
                    <button type="button" class="btn btn-pelelangan bg-color-primer text-light mt-3 ">Kirim
                        Penawaran</button>
                </div>
            </div>
        </div>



    </div>
</div>
