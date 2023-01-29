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
                                    <td>{{ $customer->address != null ? $customer->email : 'Kosong' }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.getCustomer', ['id' => $customer->user_id]) }}">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger">
                                            <i class="fa-solid fa-ban"></i>
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
