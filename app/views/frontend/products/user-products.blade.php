@extends('frontend/layout/master')
@section('title')
	Trao đổi đồ cũ
@stop
@section('script-bot')
	{{HTML::script('public/assets/js/frontend/products/my-products.js')}}
@stop
@section('category')
	<span class="category">Sản phẩm của {{$u_name}}</span>
@stop
@section('content')
    <div class="container msnry">
		<ul class="scroll">
		@foreach( $products as $key => $product)
			<li class="item">
                @include('frontend/products/_product', array('product',$product))
			</li>
		@endforeach
		</ul>
		{{ $products->links() }}
	</div>
@stop
