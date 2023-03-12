@extends('admin.layouts.master')
@section('title', 'Tambah Barang')

<div class="container" id="input-product">
    <div class="content">
        <div class="input-product-title">
            Input Barang
        </div>
        <div class="input-product-header">

        </div>
        <div class="page-content">
            @include('admin.components.formInput', [
                'method' => 'POST',
                'path' => route('dashboard.postProduct'),
                'data' => $data,
            ])
        </div>
    </div>
</div>
