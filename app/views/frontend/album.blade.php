@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	{{ $album['title'] }}
@stop
@section('content')
	<div class="image_content">
		<div class="image_left">
			<div>
				<h1>{{ $album['title'] }}</h1>
				<span>29/08/2015</span>
				<span class="like"><i>d</i> <span>16</span></span>
				<span><i>h</i> 8000</span>
			</div>
			<ul>
				@foreach($image as $key => $img)
					<li>
						<img src="{{url($img['link'])}}" alt="">
					</li>
				@endforeach
			</ul>
		</div>
		<div class="image_right">
			<ul>
				<li>
					<p class="title">ĐĂNG BỞI</p>
					<a href="#" class="user_name">Bao Huy Bao Huy</a>
				</li>
				<li>
					<p class="title">GIỚI THIỆU</p>
					<p>{{ $album['description'] }}</p>
				</li>
				<li>
					<p class="title">CHUYÊN MỤC</p>
					<a href="{{url('home/category/'.$album['category_id'])}}">{{ $album->category['category'] }}</a>
				</li>
				<li>
					<p class="title">BÌNH LUẬN</p>
					<input name="cmt" placeholder="Viết bình luận của bạn...">
					<button>Đăng</button>
				</li>
			</ul>
		</div>
	</div>
@stop
@section('script-bot')
	<script type="text/javascript">
		$(window).ready(function(){
			$('.cmt button').on('click',function(){
				var str=$('.cmt input').val();
				var comment='<p>'+str+'</p>';
				$('.comment').prepend(comment);
			})

			data: new FormData($('#form')[0]);
		})
	</script>
@stop