@extends('frontend/layout/master')
@section('title')
	Chia sẻ ảnh trực tuyến
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/products/my-products.js')}}
@stop
@section('category')
	<span class="category">Sản phẩm của tôi</span>
@stop
@section('content')
	<div class="container">
		<ul>
		@foreach( $products as $key => $product)
			@include('frontend/products/_product', array('product',$product))
		@endforeach
		</ul>
	</div>
@stop
