@extends('frontend/layout/master')
@section('title')
	Trao đổi đồ cũ
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/products/index.js')}}
@stop
@section('category')
	<span class="category">Hedspi-Exchange</span>
@stop
@section('content')
    {{ $products->links() }}
	<div class="container msnry">
		<ul class="scroll">
		@foreach( $products as $key => $product)
			<li class="item">
				@include('frontend/products/_product', array('product',$product))
			</li>
		@endforeach
		</ul>
	</div>
@stop
