@extends('frontend/layout/master')
@section('title')
	Tạo trao đổi
@stop
@section('category')
	<span class="category">Hedspi-Exchange</span>
@stop
@section('content')
    <div class="container">
        <form action='{{url('exchange')}}' method='POST'>
		<ul>
		@foreach( $products as $key => $product)
			<li class="item">
				@include('frontend/products/_product', array('product',$product))
                <input type='hidden' name='s_product_id' value='{{$product->id}}'>
                <button type='submit'>Chọn để trao đổi</button>
			</li>
		@endforeach
        </ul>
        </form>
	</div>
@stop
