@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	{{$product->title}}
@stop

@section('script-bot')
	{{ HTML::script('public/assets/js/frontend/products/show.js') }}
@stop

@section('content')
	<div class="image_content">
		<div class="image_left">

			@include('frontend/exchanges/_popup_exchange',array('user_id',Session::get('current_user')))
			<div class="top">
				<h1>{{ $product->title }}</h1>
				<span>29/08/2015</span>
				<span class="like"><i>d</i> <span>16</span></span>
				<span><i>h</i> 8000</span>
				
			</div>
			<ul>
				@foreach($product->images as $key => $img)
					<li>
						<img src="{{url($img->path)}}" alt="">
					</li>
				@endforeach
			</ul>
		</div>
		<div class="image_right">
			<ul>
				<li>
					<p class="title">ĐĂNG BỞI</p>
					<a href="#" class="user_name">{{ $product->user['account'] }}</a>
				</li>
				<li>
					<p class="title">GIỚI THIỆU</p>
					<p>{{ $product['description'] }}</p>
				</li>
				<li>
					<p class="title">CHUYÊN MỤC</p>
					<a href="{{url('product/category/'.$product['category_id'])}}">{{ $product->category['category'] }}</a>
				</li>
				<li>
					<form id="test">
						<p class="title">BÌNH LUẬN</p>
						<input name="cmt" placeholder="Viết bình luận của bạn...">
						<button>Đăng</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
@stop
