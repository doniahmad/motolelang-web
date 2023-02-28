@extends('admin.layouts.master')
@section('title', 'Data Product')

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
                                    <td>0000{{ $product->product_id }}</td>
                                    <td>{{ $product->nama_product }}</td>
                                    <td>{{ currency_IDR($product->harga_awal) }}</td>
                                    <td>{{ $product->jenis }}</td>
                                    <td>
                                        @if ($product->auction)
                                            @switch($product->auction->status)
                                                @case(1)
                                                    <label class="badge bg-warning">BERJALAN</label>
                                                @break

                                                @case(0)
                                                    <label class="badge bg-danger">TUTUP</label>
                                                @break
                                            @endswitch
                                        @else
                                            <label class="badge bg-secondary">DRAFT</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->auction)
                                            <a
                                                href="{{ route('dashboard.editProduct', ['param' => $product->product_slug]) }}">
                                                <button id="btnEdit" type="button" class="btn btn-primary">
                                                    <i class="fa-solid fa-gear"></i>
                                                </button>
                                            </a>
                                            <a
                                                href="{{ route('dashboard.deleteProduct', ['param' => $product->product_slug]) }}">
                                                <button id="btnHapus" type="button" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </a>
                                        @else
                                            <button type="button" class="btn btn-primary btn-for-modal"
                                                data-bs-toggle="modal" data-bs-target="#modalPublish"
                                                data-id="{{ $product->product_id }}"
                                                data-name="{{ $product->nama_product }}"
                                                data-merk="{{ $product->merk }}"
                                                data-bahan-bakar="{{ $product->bahan_bakar }}"
                                                data-jenis="{{ $product->jenis }}" data-warna="{{ $product->warna }}">
                                                <i class="fa-solid fa-input"></i>
                                                Publish
                                            </button>
                                            <a
                                                href="{{ route('dashboard.editProduct', ['param' => $product->product_slug]) }}">
                                                <button id="btnEdit" type="button" class="btn btn-primary">
                                                    <i class="fa-solid fa-gear"></i>
                                                </button>
                                            </a>

                                            <div href="{{ route('dashboard.deleteProduct', ['param' => $product->product_slug]) }}"
                                                id="btnHapus" type="button" class="btn btn-danger"
                                                onclick="deleteProduct(this)">
                                                <i class="fa-solid fa-trash"></i>
                                            </div>
                                        @endif

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

@include('Admin.modal.modalPublish')
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-for-modal").click(function() {
                $("#id-product").val($(this).attr("data-id"));
                $("#name-product-value").text($(this).attr("data-name"));
                $("#merk-value").text($(this).attr("data-merk"));
                $("#bahan-bakar-value").text($(this).attr("data-bahan-bakar"));
                $("#jenis-value").text($(this).attr("data-jenis"));
                $("#warna-value").text($(this).attr("data-warna"));
            });
        });

        function deleteProduct(val) {
            Swal.fire({
                title: 'Yakin ingin menghapus Product ?',
                text: "Product akan dihapus secara permanen. Mohon perhatikan pilihan anda !",
                icon: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#138611',
                cancelButtonColor: '#C72D00',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = val.getAttribute('href');
                }
            })
        }
    </script>
@endpush
