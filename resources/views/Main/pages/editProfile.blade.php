@extends('Main.layouts.master')
@section('title', 'Edit Profil')

@php
    $user = auth()->user();
@endphp

<div id="editProfil" class="konten-2">
    <form action="">
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
                                                <img id="img1" src="/assets/main/img/noimg.png" alt="">
                                            </div>
                                            <div class="caption">
                                                <label id="btnUbahFoto" for="input-file-profile"
                                                    class="btn btn-outline-secondary text-light">Ganti
                                                    Foto
                                                    <input type="file" id="input-file-profile"
                                                        onchange="loadFile(event)">
                                                </label>
                                            </div>
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
                                            value="{{ $user->name }}"></td>
                                </tr>
                                <tr>
                                    <td>No. Handphone</td>
                                    <td>:</td>
                                    <td class=""><input type="number" class="form-control" id="inputNoHp"
                                            aria-describedby="inputNoHp" placeholder="Masukkan Nomor Handphone"
                                            value="{{ $user->handphone }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputTempatLahir"
                                            aria-describedby="inputTempatLahir" placeholder="Masukkan Tempat Lahir"
                                            value="{{ $user->birth_place }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputTanggalLahir"
                                            aria-describedby="inputTanggalLahir" placeholder="Masukkan Tanggal Lahir"
                                            value="{{ $user->birth_Date }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class=""><select class="form-select" id="SelectKelamin"
                                            aria-label="Default select example">
                                            <option selected>Pilih Jenis Kelamin
                                            </option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputAlamat"
                                            aria-describedby="inputTanggalLahir" placeholder="Masukkan Alamat"
                                            value="{{ $user->address }}">
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td class=""><input type="text" class="form-control" id="inputPekerjaan"
                                            aria-describedby="inputPekerjaan" placeholder="Masukkan Pekerjaan">
                                    </td>
                                </tr> --}}
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
