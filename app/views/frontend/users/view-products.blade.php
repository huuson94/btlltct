@extends('frontend/layout/master')
@section('title')
	Trao doi do cu
@stop
@section('content')
	<h2>My products</h2>
	<div class="container-div">
		<ul>
			@foreach($data['products'] as $index => $product)
				
				@include('frontend/components/product', array('product' => $product))	
            @endforeach
		</ul>
	</div>
@stop
