@extends('frontend/layout/master')
@section('title')
	Trao đổi đồ cũ
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
			<li class="item">
                @include('frontend/products/_product', array('product',$product))
			</li>
		@endforeach
		</ul>
	</div>
@stop
