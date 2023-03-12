@extends('admin.layouts.master')
@section('title', 'Tambah Admin')

<div class="container" id="input-product">
    <div class="content">
        <div class="input-product-title">
            Tambah Admin
        </div>
        <div class="input-product-header">

        </div>
        <div class="page-content">
            @include('admin.components.formInputUser', [
                'method' => 'POST',
                'path' => route('dashboard.postAdmin'),
                'data' => isset($data) ? $data : null,
                'value' => 'Admin',
            ])
        </div>
    </div>
</div>
