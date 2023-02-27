@extends('admin.layouts.master')
@section('title', 'Data Product')

<div class="container" id="data-product">
    <div class="content">
        <div class="data-product-title">
            Data Customer
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->handphone != null ? $customer->handphone : 'Kosong' }}</td>
                                    <td>{{ $customer->address != null ? $customer->address : 'Kosong' }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.getCustomer', ['id' => $customer->user_id]) }}">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </a>
                                        @can('access owner')
                                            <button
                                                href="{{ route('dashboard.banCustomer', ['id' => $customer->user_id]) }}"
                                                id="banned" class="btn btn-danger" onclick="banAction(this)">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>
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

@push('scripts')
    <script>
        function banAction(val) {

            Swal.fire({
                title: 'Yakin ingin banned user ?',
                text: "Anda akan banned user.Pikirkan terlebih dahulu",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#138611',
                cancelButtonColor: '#C72D00',
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = val.getAttribute('href');
                } else {

                }
            });
        }
    </script>
@endpush
