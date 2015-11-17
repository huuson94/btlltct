<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{url('assets/css/frontend/style.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/frontend/animate.css')}}">
    @yield('style-bot')
	<link rel="shortcut icon" href="{{url('public/favicon.ico')}}">
	<script type="text/javascript" src="{{url('assets/js/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{url('assets/js/jquery.nicescroll.js')}}" type='text/javascript'></script>
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
                            <li><a href="{{ url('home/category/'.$category->id) }}">{{ $category->title }}</a></li>
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
					<a href="{{url('product')}}"><p class="upload_button"><i>â</i>Đăng bài</p></a>
					<a href="{{url('product?u='.Session::get('current_user'))}}"><p class="mypic_button">Sản phẩm đã đăng</p></a>
				@endif
			</div>
			@yield('content')
		</div>
		<div class="backtoTop"><img src="{{url('assets/images/up10.png')}}" alt=""></div>
	</section>

	@yield('script-bot')
	
	@include('frontend/layout/js')
</body>
</html>