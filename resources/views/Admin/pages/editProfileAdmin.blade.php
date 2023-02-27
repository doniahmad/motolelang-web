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
        <form action="{{ route('update.profileAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{ $user->user_id }}" hidden>
            <div class="page-content" id="page-content">
                <div class="row pb-5">
                    <div class="col-5">
                        <div class="d-flex justify-content-center">
                            <div class="wrapper">
                                <div class="hero-section">
                                    <div class="gallery">
                                        <div id="imgProfil" class="image-section">
                                            <img id="img1"
                                                src="{{ isset($user->photo) ? asset('storage/image/admin/' . $user->photo) : '/assets/main/img/noimg.png' }}"
                                                alt="">
                                        </div>
                                        <div class="caption">
                                            <label id="btnUbahFoto" for="input-file-profile"
                                                class="btn btn-outline-secondary text-light">Ganti
                                                Foto
                                                <input type="file" id="input-file-profile" onchange="loadFile(event)"
                                                    name="photo">
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
                                    <td class=""><input type="text" class="form-control" id="inputNama"
                                            aria-describedby="inputNama" placeholder="Masukkan Nama Anda"
                                            value="{{ isset($user->name) ? $user->name : null }}" name="name"></td>
                                </tr>
                                <tr>
                                    <td>No. Handphone</td>
                                    <td>:</td>
                                    <td class=""><input type="number" class="form-control" id="inputNoHp"
                                            aria-describedby="inputNoHp" placeholder="Masukkan Nomor Handphone"
                                            value="{{ isset($user->handphone) ? $user->handphone : null }}"
                                            name="handphone">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputTempatLahir"
                                            aria-describedby="inputTempatLahir" placeholder="Masukkan Tempat Lahir"
                                            value="{{ isset($user->birth_place) ? $user->birth_place : null }}"
                                            name="birth_place">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td class=""><input type="date" class="form-control" id="inputTanggalLahir"
                                            aria-describedby="inputTanggalLahir" placeholder="Masukkan Tanggal Lahir"
                                            value="{{ isset($user->birth_date) ? $user->birth_date : null }}"
                                            name="birth_date">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class=""><select class="form-select" id="SelectKelamin"
                                            aria-label="Default select example" name="gender">
                                            <option selected value="{{ null }}">Pilih Jenis Kelamin
                                            </option>
                                            <option value="pria" {{ $user->gender === 'pria' ? 'selected' : '' }}>Pria
                                            </option>
                                            <option value="wanita" {{ $user->gender === 'wanita' ? 'selected' : '' }}>
                                                Wanita</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputAlamat"
                                            aria-describedby="inputTanggalLahir" placeholder="Masukkan Alamat"
                                            value="{{ isset($user->address) ? $user->address : null }}" name="address">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex">
                        <button type="submit" id="btnAturProfil" class="text-decoration-none ms-auto">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('Admin.modal.modalPublish')
@push('scripts')
    <script>
        const loadFile = function(event) {
            const image = document.getElementById("img1");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
