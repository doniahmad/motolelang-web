@extends('admin.layouts.master')
@section('title', 'Detail Admin')

<div class="container" id="data-product">
    <div class="content" id="detail-customer">
        <div class="data-product-title">
            Informasi Admin
        </div>
        <div class="data-product-header">
        </div>
        <div class="page-content pb-3" id="page-content">
            <div class="row pb-5">
                <div class="col-5">
                    <div class="d-flex justify-content-center">
                        <div id="imgProfil" class="image-section">
                            <img id="img1"
                                src="{{ $data->photo !== null ? asset('storage/image/admin/' . $data->photo) : asset('assets/main/img/noimg.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-7
                                d-flex align-items-center">
                    <table class="table table-borderless">
                        <tbody class="">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="">
                                    {{ isset($data->name) ? $data->name : 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>:</td>
                                <td class="">{{ isset($data->handphone) ? $data->handphone : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td class="">{{ isset($data->birth_place) ? $data->birth_place : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td class="">{{ isset($data->birth_date) ? $data->birth_date : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td class="">{{ isset($data->gender) ? $data->gender : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td class="">{{ isset($data->address) ? $data->address : 'Belum diisi' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
