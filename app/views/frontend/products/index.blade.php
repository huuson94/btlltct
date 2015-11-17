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
		@foreach( $products as $key => $val)
			<li class="item">
				<article>
					<a href="{{url('/home/album/'.$val['id'])}}"><img src="{{url($val['album_img'])}}" alt=""></a>
					<div class="photo_content">
						<a href="{{url('/home/album/'.$val['id'])}}"><p class="title">{{ $val['title'] }}</p></a>
						<p class="user_by">{{ $val->user['account'] }}</p>
						<div class="view">
							<span class="like"><i>d</i> <span>16</span></span>
							<span><i>h</i> 8000</span>
						</div>
					</div>
				</article>
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