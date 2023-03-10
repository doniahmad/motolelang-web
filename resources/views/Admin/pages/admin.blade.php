@extends('admin.layouts.master')
@section('title', 'Data Product')

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Admin
        </div>
        @can('access owner')
            <div class="data-product-header">
                <a href="{{ route('dashboard.inputAdmin') }}">
                    <button type="button" class="btn btn-primary">
                        Tambah
                    </button>
                </a>
            </div>
        @endcan
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
                            @isset($data)

                                @foreach ($data as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->handphone != null ? $admin->handphone : 'Kosong' }}</td>
                                        <td>{{ $admin->address != null ? $admin->email : 'Kosong' }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.getAdmin', ['id' => $admin->user_id]) }}">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </button>
                                            </a>
                                            @can('access owner')
                                                <button href="{{ route('dashboard.deleteAdmin', ['id' => $admin->user_id]) }}"
                                                    id="btn-delete-admin" type="button" class="btn btn-danger"
                                                    onclick="deleteAdmin(this)">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            @endcan

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

@push('scripts')
    <script type="text/javascript">
        function deleteAdmin(val) {
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
