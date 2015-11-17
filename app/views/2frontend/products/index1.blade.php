@extends('frontend/layout/master')
@section('script-bot')
	{{ HTML::script('public/assets/js/index.js') }}
@stop
@section('title')
	Trao doi do cu
@stop
@section('content')
	<div class="container-div">
		<ul>
			@foreach($data['products'] as $index => $product)
               
                    @include('frontend/components/product', array('product' => $product))
                
                
            @endforeach
		</ul>
	</div>
@stop
