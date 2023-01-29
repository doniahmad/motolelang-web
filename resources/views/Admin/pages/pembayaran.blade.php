@extends('admin.layouts.master')
@section('title', 'Data Product')

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Pembayaran
        </div>
        <div class="data-product-header">
            {{-- <a href="{{ route('dashboard.inputProduct') }}">
                <button type="button" class="btn btn-primary">
                    Tambah
                </button>
            </a> --}}
        </div>
        <div class="page-content" id="page-content">
            <div class="table-data-product">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. LOT</th>
                                <th>Nama Barang</th>
                                <th>Nama Pemenang</th>
                                <th>Total Pembayaran</th>
                                <th>Waktu Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $payment) --}}
                            <tr>
                                <td>000001</td>
                                {{-- <td>{{ $product->nama_product }}</td> --}}
                                {{-- <td>Rp. {{ $product->harga_awal }}</td> --}}
                                {{-- <td>{{ $product->jenis }}</td> --}}
                                {{-- <td>{{ $product->jenis }}</td> --}}
                                {{-- <td>{{ $product->jenis }}</td> --}}
                                {{-- <td><label class="badge bg-warning">{{ $product->status_pelelangan }}</label></td> --}}
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-x"></i>
                                    </button>

                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
