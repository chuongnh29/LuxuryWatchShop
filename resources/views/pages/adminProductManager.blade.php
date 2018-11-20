@extends('baseAdmin')
@section('content')
@include('adminHeader')
<div id="content-wrapper">
		<div id="product-table">
        @include('crudProduct')
		</div>
        <!-- Sticky Footer -->
        @include('adminFooter')

      </div>
@endsection