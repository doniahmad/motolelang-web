@extends('admin.layouts.master')
@section('title', 'Profil Pekerja')
@php
    $user = auth()->user();
@endphp

<div class="container" id="data-product">
    <div class="content" id="detail-customer">
        <div class="data-product-title">
            Profil Admin
        </div>
        <div class="data-product-header">
        </div>
        <div class="page-content " id="page-content">
            <div class="row pb-5">
                <div class="col-5">
                    <div class="d-flex justify-content-center">
                        <div id="imgProfil" class="image-section">
                            <img id="img1"
                                src="{{ isset($user->photo) ? asset('storage/image/admin/' . $user->photo) : '/assets/main/img/noimg.png' }}"
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
                                    {{ isset($user->name) ? $user->name : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>:</td>
                                <td class="">{{ isset($user->handphone) ? $user->handphone : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td class="">{{ isset($user->birth_place) ? $user->birth_place : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td class="">{{ isset($user->birth_date) ? $user->birth_date : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td class="">{{ isset($user->gender) ? $user->gender : 'Belum diisi' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td class="">{{ isset($user->address) ? $user->address : 'Belum diisi' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex">
                    <a id="btnAturProfil" href="{{ route('dashboard.editProfil') }}"
                        class="text-decoration-none ms-auto">Atur
                        Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.modal.modalPublish')
@push('scripts')
@endpush
