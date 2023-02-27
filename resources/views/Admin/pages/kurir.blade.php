@extends('admin.layouts.master')
@section('title', 'Data Product')

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Kurir
        </div>
        <div class="data-product-header">
            @canany(['access admin', 'access owner'])
                <a href="{{ route('dashboard.inputKurir') }}">
                    <button type="button" class="btn btn-primary">
                        Tambah
                    </button>
                </a>
            @endcan
        </div>
        <div class="page-content" id="page-content">
            <div class="table-data-product">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $kurir)
                                <tr>
                                    <td>{{ $kurir->name }}</td>
                                    <td>{{ $kurir->email }}</td>
                                    <td>{{ $kurir->handphone != null ? $kurir->handphone : 'Kosong' }}</td>
                                    <td>{{ $kurir->address != null ? $kurir->email : 'Kosong' }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.detailKurir', ['id' => $kurir->user_id]) }}">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </a>
                                        @can('access owner')
                                            <a href="{{ route('dashboard.deleteKurir', ['id' => $kurir->user_id]) }}"
                                                id="hapus-kurir" type="button" class="btn btn-danger"
                                                onclick="deleteKurir(this)">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endcan

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

@push('kurir')
    <script type="text/javascript">
        function deleteKurir(val) {
            Swal.fire({
                title: 'Yakin ingin menghapus Admin ?',
                text: "Anda akan menghapus Admin. Pikirkan terlebih dahulu",
                icon: 'warning',
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
