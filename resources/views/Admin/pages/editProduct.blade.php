@extends('admin.layouts.master')
@section('title', 'Ubah Barang')

<div class="container" id="input-product">
    <div class="content">
        <div class="input-product-title">
            Ubah Barang
        </div>
        <div class="input-product-header">

        </div>
        <div class="page-content">
            @include('Admin.components.formInput', [
                'method' => 'POST',
                'path' => route('dashboard.postProduct'),
            ])
        </div>
    </div>
</div>
