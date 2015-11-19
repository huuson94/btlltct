@extends('frontend/layout/master')
@section('title')
	Chia sẻ ảnh trực tuyến
@stop
@section('category')
	<span class="category">{{ $category['category'] }}</span>
@stop
@section('content')
	<div class="container">
		<ul>
		@foreach( $album as $key => $val)
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

			//count like
			$('.like').click(function(){
				var x=$(this).find('span').text();
				if($(this).find('i').text()=='d'){$(this).find('i').text('c');x++;$(this).find('span').text(x);}
					else {$(this).find('i').text('d');x--;$(this).find('span').text(x);}
			})
		})
		
</script>
@stop