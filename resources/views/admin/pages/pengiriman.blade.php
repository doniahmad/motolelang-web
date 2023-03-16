@extends('admin.layouts.master')
@section('title', 'Data Product')
{{-- @dd($data); --}}

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Pengiriman
        </div>
        <div class="page-content" id="page-content">
            <div class="table-data-product">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Penerima</th>
                                <th class="text-center">Alamat Pengiriman</th>
                                <th class="text-center">No Hp</th>
                                <th class="text-center">Kurir</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Bukti Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)

                                @foreach ($data as $pengiriman)
                                    <tr>
                                        <td class="text-center">
                                            {{ $pengiriman->invoice->auctioneer->auction->product->nama_product }}</td>
                                        <td class="text-center">{{ $pengiriman->invoice->auctioneer->user->name }}</td>
                                        <td class="text-center">{{ $pengiriman->invoice->auctioneer->user->address }}</td>
                                        <td class="text-center">{{ $pengiriman->invoice->auctioneer->user->handphone }}</td>
                                        <td class="text-center">{{ $pengiriman->kurir->name }}</td>
                                        @switch($pengiriman->status)
                                            @case('perjalanan')
                                                <td class="text-center"><label class="badge bg-warning">Dalam Perjalanan</label>
                                                </td>
                                            @break

                                            @case('diterima')
                                                <td class="text-center"><label class="badge bg-success">Sudah Diterima</label>
                                                </td>
                                            @break

                                            @default
                                                <td class="text-center">-</td>
                                        @endswitch
                                        <td class="text-center">
                                            @if ($pengiriman->bukti_penerimaan !== null)
                                                <img src="{{ asset('storage/image/penerimaan/' . $pengiriman->bukti_penerimaan) }}"
                                                    alt="" style="width: 100px;height: 100px; object-fit:cover;">
                                            @else
                                                <button type="button" class="btn btn-primary btn-modal-terkirim"
                                                    data-bs-toggle="modal" data-bs-target="#modalPenerimaan"
                                                    onclick="setBukti({{ $pengiriman->pengiriman_id }})">
                                                    Kirim Bukti
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.modal.modalBuktiPenerimaan')

@push('scripts')
    <script type="text/javascript">
        function setBukti(id) {
            const form = document.getElementById('form-penerimaan');
            form.action = '/dashboard/pengiriman/delivered/' + id;
        };
    </script>
@endpush
