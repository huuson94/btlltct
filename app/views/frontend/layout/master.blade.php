<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{url('public/assets/css/frontend/style.css')}}">
	<link rel="stylesheet" href="{{url('public/assets/css/frontend/animate.css')}}">
    @yield('style-bot')
	<link rel="shortcut icon" href="{{url('public/images/favicon.ico')}}">
	<script type="text/javascript" src="{{url('public/assets/js/frontend/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{url('public/assets/js/frontend/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{url('public/assets/js/frontend/imagesloaded.pkgd.min.js')}}"></script>
	<script type='text/javascript' src="{{url('public/assets/js/frontend/jquery.nicescroll.js')}}"></script>
    {{HTML::script('public/assets/js/frontend/layout/master.js')}}
    @yield('script-bot')
    
</head>
<body>
	@include('frontend/layout/header')
	<section>
		<div class="wrapper @yield('width_70per')">
			@yield('category')
			<div class="categories @yield('width_70per')">
				<p class="menu_button"><span></span>Danh mục</p>
				<div class="menu">
					<ul>
						<li><a href="#">Được trao đổi nhiều nhất</a></li>
						<li><a href="#">Tất cả</a></li>
					</ul>
					<ul>
                        @foreach ($categories as $key => $category)
                            <li><a href="{{ url('product?category='.$category->id) }}">{{ $category->title }}</a></li>
                        @endforeach
					</ul>
					<ul class="team_contact">
						<li><a href="">Giới thiệu</a></li>
						<li><a href="">Chính Sách Riêng Tư</a></li>
						<li><a href="">Hỗ Trợ</a></li>
						<li><a href="">Liên Hệ</a></li>
					</ul>
				</div>
				@if(Session::has('current_user'))
					<a href="{{url('product/create')}}"><p class="upload_button"><i>â</i>Đăng sản phẩm</p></a>
					<a href="{{url('product?u='.Session::get('current_user'))}}"><p class="mypic_button">Sản phẩm đã đăng</p></a>
				@endif
			</div>
			@yield('content')
		</div>
		<div class="backtoTop"><img src="{{url('public/assets/images/up10.png')}}" alt=""></div>
	</section>

	
</body>
</html>