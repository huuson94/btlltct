@extends('frontend/layout/master')
@section('content')
<h1>Chuyên mục {{ $data['category']->title }}</h1>
	<div class="container-div">
		<ul>
			@foreach($data['products'] as $index => $product)
           
             @include('frontend/components/product', array('product' => $product))
            
            @endforeach
		</ul>
	</div>
@stop
