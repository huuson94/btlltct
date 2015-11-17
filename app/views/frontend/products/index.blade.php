@extends('frontend/layout/master')
@section('script-bot')
	{{ HTML::script('public/assets/js/frontend/layout/master.js') }}
@stop
@section('title')
	Trao đổi đồ cũ
@stop
@section('category')
	<span class="category">Hedspi-Exchange</span>
@stop
@section('content')
	<div class="container">
		<ul>
    		@foreach($data['products'] as $index => $product)
                @include('frontend/components/product', array('product' => $product))
            @endforeach
		</ul>
	</div>
@stop
