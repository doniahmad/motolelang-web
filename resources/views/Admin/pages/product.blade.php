@extends('admin.layouts.master')
@section('title', 'Data Product')

{{-- @push('scripts')
    <script src="/assets/API/GET/getDataProduct.js"></script>
@endpush --}}

{{-- @dd($data) --}}
<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Barang
        </div>
        <div class="data-product-header">
            <a href="{{ route('dashboard.inputProduct') }}">
                <button type="button" class="btn btn-primary">
                    Tambah
                </button>
            </a>
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
                            @foreach ($data as $product)
                                <tr>
                                    <td>{{ $product->product_id }}</td>
                                    <td>{{ $product->nama_product }}</td>
                                    <td>Rp. {{ $product->harga_awal }}</td>
                                    <td>{{ $product->jenis }}</td>
                                    <td>

                                        <label class="badge bg-warning">BERJALAN</label>
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.editProduct', ['id' => $product->product_id]) }}">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-gear"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
