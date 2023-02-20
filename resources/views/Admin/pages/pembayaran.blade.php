@extends('admin.layouts.master')
@section('title', 'Data Product')

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Pembayaran
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
                                <th>Nama Pemenang</th>
                                <th>Total Tagihan</th>
                                <th>Waktu Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $invoice)
                                <tr>
                                    <td>000001</td>
                                    <td>{{ $invoice->auctioneer->auction->product->nama_product }}</td>
                                    <td>{{ $invoice->auctioneer->user->name }}</td>
                                    <td>{{ $invoice->invoice }}</td>
                                    <td>{{ isset($invoice->bukti_pembayaran) ? 'Iya' : 'Belum Ada' }}</td>
                                    <td>{{ isset($invoice->bukti_pembayaran) ? 'Iya' : 'Belum Ada' }}</td>
                                    <td><label class="badge bg-warning">{{ $invoice->status }}</label></td>
                                    <td class="d-flex">
                                        @if ($invoice->status == 'menunggu_persetujuan')
                                            <div>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </div>

                                            <button type="submit" class="btn btn-danger btn-modal-alasan"
                                                data-bs-toggle="modal" data-bs-target="#modalAlasan"
                                                data-kode="{{ $invoice->kode_pembayaran }}">
                                                <i class="fa-solid fa-x"></i>
                                            </button>
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

@include('admin.modal.modalAlasan')

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".btn-modal-alasan").click(function() {
                $("#kode_pembayaran").val($(this).attr("data-kode"));
            });
        });
    </script>
@endpush
