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
            <div class="top">
				<h1>{{ $product->title }}</h1>
				<span>{{$product->updated_at}}</span>
<!--				<span class="like"><i>d</i> <span>16</span></span>
				<span><i>h</i> 8000</span>-->
				
		        @if(FEUsersHelper::isLogged())
		        <a href="{{url('exchange/create?id='.$product->id)}}" style="font-size: 18px;">Trao đổi</a>
		        @endif
			</div>
			<ul>
				@if($product->images->count() > 0)
				@foreach($product->images as $key => $img)
					<li>
						<img src="{{url($img['path'])}}" alt="">
					</li>
				@endforeach
                @else
                <li>
                <img src="{{Asset(BaseHelper::getDefaultProductImage())}}" alt="">
                </li>
                @endif
			</ul>
		</div>
		<div class="image_right">
			<ul>
				<li>
					<p class="title">ĐĂNG BỞI</p>
					<a href="{{url('product?user_id='.$product->user_id)}}" class="user_name">{{ $product->user['account'] }}</a>
				</li>
				<li>
					<p class="title">GIỚI THIỆU</p>
					<p>{{ $product['description'] }}</p>
				</li>
				<li>
					<p class="title">CHUYÊN MỤC</p>
					<a href="{{url('product?category_id='.$product['category_id'])}}">{{ $product->category['title'] }}</a>
				</li>
			</ul>
		</div>
	</div>
@stop
