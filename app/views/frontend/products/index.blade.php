@extends('frontend/layout/master')
@section('title')
	Chia sẻ ảnh trực tuyến
@stop
@section('category')
	<span class="category">Hedspi-Exchange</span>
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
@section('script-bot')
	<script>
		$(document).ready(function() {
			
			$('.container').imagesLoaded( function() {
  				var $container = $('.container');
				$container.masonry({
					itemSelector: '.item',
					columWidth:200
				});
			});
        })
		
</script>
@stop