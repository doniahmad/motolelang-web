@extends('admin.layouts.master')
@section('title', 'Tambah Kurir')

<div class="container" id="input-product">
    <div class="content">
        <div class="input-product-title">
            Tambah Kurir
        </div>
        <div class="input-product-header">

        </div>
        <div class="page-content">
            @include('admin.components.formInputUser', [
                'method' => 'POST',
                'path' => route('dashboard.postKurir'),
                'data' => isset($data) ? $data : null,
                'value' => 'Kurir',
            ])
        </div>
    </div>
</div>
