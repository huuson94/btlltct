@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	{{$product->title}}
@stop
@section('content')
	<div class="image_content">
		<div class="image_left">

			<a href="javascript:void(0)" class="exchange">Trao đổi</a>
			<div class="pop-up-exchange">
				<div class="overlay"></div>
				<div class="wrapper">
					<span title="Click to close">x</span>
					<h4>Chọn vật phẩm bạn muốn đổi</h4>
					<ul>
						<li>
							<input class="float_left" type="radio" name="my_product">
							<div class="img">
								<img src="{{url('assets/images/test.jpg')}}" alt="">
							</div>
							<div class="title"><p>ABC XYZ</p></div>
						</li>
						<li>
							<input class="float_left" type="radio" name="my_product">
							<div class="img">
								<img src="{{url('assets/images/test.jpg')}}" alt="">
							</div>
							<div class="title"><p>ABC XYZ</p></div>
						</li>
						<li>
							<input class="float_left" type="radio" name="my_product">
							<div class="img">
								<img src="{{url('assets/images/test.jpg')}}" alt="">
							</div>
							<div class="title"><p>ABC XYZ</p></div>
						</li>
						<li>
							<input class="float_left" type="radio" name="my_product">
							<div class="img">
								<img src="{{url('assets/images/test.jpg')}}" alt="">
							</div>
							<div class="title"><p>ABC XYZ</p></div>
						</li>
						<li>
							<input class="float_left" type="radio" name="my_product">
							<div class="img">
								<img src="{{url('assets/images/test.jpg')}}" alt="">
							</div>
							<div class="title"><p>ABC XYZ</p></div>
						</li>
					</ul>
					<div class="submit"><button>Xác nhận</button></div>
				</div>
			</div>
			<div class="top">
				<h1>{{ $product['title'] }}</h1>
				<span>29/08/2015</span>
				<span class="like"><i>d</i> <span>16</span></span>
				<span><i>h</i> 8000</span>
				
			</div>
			<ul>
				@foreach($product->images as $key => $img)
					<li>
						<img src="{{url($img['path'])}}" alt="">
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
@section('script-bot')
	<script type="text/javascript">
		

		$(window).ready(function(){
			//Effect for Signin
			$('.exchange').click(function(){
				$('.pop-up-exchange').removeClass("slideOutLeft").addClass("animated slideInDown");
				$('.pop-up-exchange').css("display","block");
				$('body').css("position","fixed");
			})
			$('.pop-up-exchange span').click(function(){
				$('.pop-up-exchange').addClass("slideOutLeft").removeClass("slideInDown");
				setTimeout(function(){
					$('.pop-up-exchange').css("display","none");
				},600);
				$('body').css("position","static");
			})
		})
	</script>
@stop