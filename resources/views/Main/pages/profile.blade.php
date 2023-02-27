@extends('Main.layouts.master')
@section('title', 'Profil')

@php
    $user = auth()->user();
@endphp

<div id="profil" class="konten-2">
    <div class="container border bg-white">
        <div class="p-5">
            <h4>Profile</h4>
            <div class="row pt-5">
                <div class="col-5">
                    <div class="d-flex justify-content-center">
                        <img src="{{ $user->photo !== null ? asset('storage/image/user/' . $user->photo) : '/assets/main/img/noimg.png' }}"
                            alt="" style="object-fit: cover">
                    </div>
                </div>
                <div class="col-7 d-flex align-items-center">
                    <table class="table table-borderless">
                        <tbody class="">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td id="table-border" class="">{{ isset($user->name) ? $user->name : '' }}</td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>:</td>
                                <td id="table-border" class="border2">
                                    {{ isset($user->handphone) ? $user->handphone : '' }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td id="table-border" class="border2">
                                    {{ isset($user->birth_place) ? $user->birth_place : 'Kosong' }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td id="table-border" class="border2">
                                    {{ isset($user->birth_date) ? $user->birth_date : 'Kosong' }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td id="table-border" class="border2">
                                    {{ isset($user->gender) ? $user->gender : 'Kosong' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td id="table-border" class="border2">
                                    {{ isset($user->address) ? $user->address : 'Kosong' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex">
                <a id="btnAturProfil" href="{{ route('profil.edit') }}" class="text-decoration-none ms-auto">Atur
                    Profil</a>
            </div>

        </div>


    </div>
</div>
