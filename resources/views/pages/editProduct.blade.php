@extends('baseAdmin')
@section('content')
    @include('adminHeader')
    <div id="content-wrapper">
        <div id="add-product-form">
            @include('addProductForm')
        </div>
        <!-- Sticky Footer -->
        @include('adminFooter')

    </div>
@endsection
