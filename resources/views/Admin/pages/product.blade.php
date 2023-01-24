@extends('admin.layouts.master')
@section('title', 'Data Product')


<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Barang
        </div>
        <div class="data-product-header">

        </div>
        <div class="page-content" id="page-content">
            <div class="table-data-product">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. LOT</th>
                                <th>Nama Barang</th>
                                <th>Harga Awal</th>
                                <th>Kategori</th>
                                <th>Status Pelelangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>000001</td>
                                <td>Beat 2021</td>
                                <td>Rp. 13.113.002</td>
                                <td>Motor Listrik</td>
                                <td><label class="badge bg-warning">BERJALAN</label></td>
                                <td>

                                    <button type="button" class="btn btn-primary">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Beat 2021</td>
                                <td>Rp. 13.113.002</td>
                                <td>Motor Listrik</td>
                                <td><label class="badge bg-warning">BERJALAN</label></td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Beat 2021</td>
                                <td>Rp. 13.113.002</td>
                                <td>Motor Listrik</td>
                                <td><label class="badge bg-warning">BERJALAN</label></td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
