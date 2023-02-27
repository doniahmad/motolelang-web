@extends('admin.layouts.master')
@section('title', 'Data Product')

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Pembayaran
        </div>
        <div class="data-product-header">
        </div>
        <div class="page-content pembayaran-content" id="page-content">
            <div class="table-data-product">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">No. LOT</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Nama Pemenang</th>
                                <th class="text-center">Total Tagihan</th>
                                <th class="text-center">Bukti Pembayaran</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $invoice)
                                <tr>
                                    <td>000001</td>
                                    <td class="text-center">{{ $invoice->auctioneer->auction->product->nama_product }}
                                    </td>
                                    <td class="text-center">{{ $invoice->auctioneer->user->name }}</td>
                                    <td class="text-center">{{ $invoice->invoice }}</td>
                                    <td class="text-center">
                                        @if ($invoice->bukti_pembayaran !== null)
                                            <a
                                                href="{{ asset('storage/image/invoice/' . $invoice->bukti_pembayaran) }}">
                                                <img src="{{ asset('storage/image/invoice/' . $invoice->bukti_pembayaran) }}"
                                                    alt="" class="img-bukti-pembayaran"
                                                    id="img-bukti-pembayaran">
                                            </a>
                                        @else
                                            Kosong
                                        @endif
                                    </td>
                                    @switch($invoice->status)
                                        @case('belum_dibayar')
                                            <td class="text-center"><label class="badge bg-secondary">Belum Dibayar</label></td>
                                        @break

                                        @case('menunggu_persetujuan')
                                            <td class="text-center"><label class="badge bg-warning">Menunggu Persetujuan</label>
                                            </td>
                                        @break

                                        @case('ditolak')
                                            <td class="text-center"><label class="badge bg-danger">Ditolak</label></td>
                                        @break

                                        @case('dibayar')
                                            <td class="text-center"><label class="badge bg-success">Dikirim</label></td>
                                        @break

                                        @default
                                    @endswitch
                                    <td class="d-flex">
                                        @if ($invoice->status == 'menunggu_persetujuan')
                                            <div class="text-center">
                                                <button type="button" class="btn btn-primary btn-modal-kirim"
                                                    data-bs-toggle="modal" data-bs-target="#modalKirim"
                                                    data-invoice="{{ $invoice->invoice_id }}"
                                                    data-kode="{{ $invoice->kode_pembayaran }}">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-modal-alasan"
                                                    data-bs-toggle="modal" data-bs-target="#modalAlasan"
                                                    data-kode="{{ $invoice->kode_pembayaran }}">
                                                    <i class="fa-solid fa-x"></i>
                                                </button>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                --
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

@include('admin.modal.modalAlasan')
@include('admin.modal.modalSelectKurir')

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".btn-modal-alasan").click(function() {
                $("#kode_pembayaran").val($(this).attr("data-kode"));
            });
        });
        $(document).ready(function() {
            $(".btn-modal-kirim").click(function() {
                $("#modal-id-invoice").val($(this).attr("data-invoice"));
                $("#kode-pembayaran-kirim").val($(this).attr("data-kode"));
            });
        });
    </script>
    <script type="text/javascript" src="/assets/admin/js/rejectPembayaran.js"></script>
@endpush
