@extends('admin.layouts.master')
@section('title', 'Dashboard')

<div class="container" id="dashboard">
    <section id="info">

        <div class="row parent-row">
            <div class="col parent-col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="card-brand" id="i-1">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="card-title">4</h2>
                                <p class="card-text">Jumlah Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col parent-col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="card-brand" id="i-2">
                                    <i class="fa-solid fa-motorcycle"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="card-title">4</h2>
                                <p class="card-text">Jumlah Product</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col parent-col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="card-brand" id="i-3">
                                    <i class="fa-sharp fa-solid fa-check"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="card-title">4</h2>
                                <p class="card-text">Transaksi Sukses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col parent-col">
                <div class="card">
                    <div class="card-body justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-5">
                                <div class="card-brand" id="i-4">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="card-title">4</h2>
                                <p class="card-text">Transaksi Gagal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="riwayat">
        <div class="riwayat content">
            <div class="riwayat-title">
                Riwayat Lelang
            </div>
            <div class="riwayat-header">

            </div>
            <div class="page-content" id="page-content">
                <div class="table-riwayat">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Pemasang</th>
                                    <th>NOMINAL BID</th>
                                    <th>Nama Barang</th>
                                    <th>No. LOT</th>
                                    <th>Tanggal Pemasangan</th>
                                    <th>Status Pelelangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aril Ponco Nugroho</td>
                                    <td>Rp. 13.113.002</td>
                                    <td>Beat 2021</td>
                                    <td>000001</td>
                                    <td>20 November 2022</td>
                                    <td><label class="badge bg-warning">BERJALAN</label></td>
                                </tr>
                                <tr>
                                    <td>Aril Ponco Nugroho</td>
                                    <td>Rp. 13.113.002</td>
                                    <td>Beat 2021</td>
                                    <td>000001</td>
                                    <td>20 November 2022</td>
                                    <td><label class="badge bg-success">SELESAI</label></td>
                                </tr>
                                <tr>
                                    <td>Aril Ponco Nugroho</td>
                                    <td>Rp. 13.113.002</td>
                                    <td>Beat 2021</td>
                                    <td>000001</td>
                                    <td>20 November 2022</td>
                                    <td><label class="badge bg-danger">DIBATALKAN</label></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
