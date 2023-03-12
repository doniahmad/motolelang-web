@extends('Main.layouts.master')
@section('title', 'Edit Profil')

@php
    $user = auth()->user();
@endphp

<div id="editProfil" class="konten-2">
    <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" value="{{ $user->user_id }}" hidden>
        <div class="container border bg-white">
            <div class="p-5">
                <h4>Atur Profile</h4>
                <div class="row pt-5">
                    <div class="col-5">
                        <div class="d-flex justify-content-center">
                            <div class="wrapper">
                                <div class="container">
                                    <div class="hero-section">
                                        <div class="gallery">
                                            <div id="imgProfil" class="image-section">
                                                <img id="img1"
                                                    src="{{ $user->photo !== null ? asset('storage/image/user/' . $user->photo) : '/assets/main/img/noimg.png' }}"
                                                    alt="">
                                            </div>
                                            <div class="caption">
                                                <label id="btnUbahFoto" for="input-file-profile"
                                                    class="btn btn-outline-secondary text-light">Ganti
                                                    Foto
                                                    <input type="file" id="input-file-profile"
                                                        onchange="loadFile(event)" name="photo">
                                                </label>
                                            </div>
                                        </div>
                                        @error('photo')
                                            <div class="text-danger" style="font-size:14px;">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                            value="{{ old('name', isset($user->name)) ? $user->name : null }}"
                                            name="name"></td>
                                </tr>
                                <tr>
                                    <td>No. Handphone</td>
                                    <td>:</td>
                                    <td class=""><input type="number" class="form-control" id="inputNoHp"
                                            aria-describedby="inputNoHp" placeholder="Masukkan Nomor Handphone"
                                            value="{{ old('handphone', isset($user->handphone)) ? $user->handphone : null }}"
                                            name="handphone">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputTempatLahir"
                                            aria-describedby="inputTempatLahir" placeholder="Masukkan Tempat Lahir"
                                            value="{{ old('birth_place', isset($user->birth_place)) ? $user->birth_place : null }}"
                                            name="birth_place">
                                        @error('birth_place')
                                            <div class="text-danger" style="font-size:12px;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td class=""><input type="date" class="form-control" id="inputTanggalLahir"
                                            aria-describedby="inputTanggalLahir" placeholder="Masukkan Tanggal Lahir"
                                            value="{{ old('birth_date', isset($user->birth_date)) ? $user->birth_date : null }}"
                                            name="birth_date">
                                        @error('birth_date')
                                            <div class="text-danger" style="font-size:12px;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class=""><select class="form-select" id="SelectKelamin"
                                            aria-label="Default select example" name="gender">
                                            <option selected value="{{ null }}">Pilih Jenis Kelamin
                                            </option>
                                            <option value="pria"
                                                {{ old('gender', $user->gender) === 'pria' ? 'selected' : '' }}>
                                                Pria
                                            </option>
                                            <option value="wanita"
                                                {{ old('gender', $user->gender) === 'wanita' ? 'selected' : '' }}>
                                                Wanita</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger" style="font-size:12px;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputAlamat"
                                            aria-describedby="inputTanggalLahir" placeholder="Masukkan Alamat"
                                            value="{{ old('address', isset($user->address)) ? $user->address : null }}"
                                            name="address">
                                        @error('address')
                                            <div class="text-danger" style="font-size:12px;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex">
                    <button type="submit" id="btnAturProfil" class="text-decoration-none ms-auto">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    var loadFile = function(event) {
        var image = document.getElementById("img1");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
