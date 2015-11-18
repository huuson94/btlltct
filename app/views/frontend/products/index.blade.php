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
    @if(Session::has('errors_message'))
    @foreach(Session::get('errors_message') as $message)
    {{$message}}
    @endforeach
    @endif
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
