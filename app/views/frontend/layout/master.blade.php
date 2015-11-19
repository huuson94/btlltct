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
    {{HTML::script('public/assets/js/frontend/jquery-ias.min.js')}}
    {{HTML::script('public/assets/js/frontend/layout/master.js')}}
    @yield('script-bot')
    
</head>
<body>
	@include('frontend/layout/header')
    <section>
		<div class="wrapper @yield('width_70per')">
			@yield('category')
			@include('frontend/layout/_nav')
            @include('frontend/layout/_messages_block')
			@yield('content')
		</div>
		<div class="backtoTop"><img src="{{url('public/assets/images/up10.png')}}" alt=""></div>
	</section>

	
</body>
</html>