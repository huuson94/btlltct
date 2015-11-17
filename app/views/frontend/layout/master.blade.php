<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="{{url('favicon.ico')}}">
	
    {{ HTML::style('assets/css/frontend/style.css') }}
    {{ HTML::style('assets/css/frontend/bootstrap.min.css') }}
    {{ HTML::style('assets/css/frontend/jquery-ui.min.css') }}
    {{ HTML::style('assets/css/frontend/animate.css') }}
    @yield('style-bot')
    {{ HTML::script('assets/js/frontend/jquery-1.11.3.min.js') }}
    {{ HTML::script('assets/js/frontend/jquery-ui.min.js') }}
    {{ HTML::script('assets/js/frontend/jquery.nicescroll.js') }}
    {{ HTML::script('assets/js/frontend/scripts.js') }}
    {{ HTML::script('assets/js/frontend/bootstrap.min.js') }}
    {{ HTML::script('assets/js/frontend/imagesloaded.js') }}
    {{ HTML::script('assets/js/frontend/masonry.pkgd.min.js') }}
    @yield('script-bot')
    {{ HTML::style("vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css")}}
    {{ HTML::script("vendor/kartik-v/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js")}}
    {{ HTML::script("vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js")}}
    {{ HTML::script("vendor/kartik-v/bootstrap-fileinput/js/fileinput_locale_LANG.js")}}
	{{ HTML::script("assets/js/frontend/layout/master.js")}}

</head>
<body>
    <header class='col-md-12'>
		<div class="top">
			<div class="col-md-3 logo">
                <h1  style='display: none;'>Photo</h1>
                </a></h4>
                <h4 id='link-to-home' class='col-md-4'><a href="{{url('/home')}}">HOME</a></h4>
            </div>
			<ul class="col-md-4 search_area">
				
				<li>
                    <form action="{{url('home/search')}}" method="get">
                        <p class='col-md-10'><input type="text" placeholder="Tìm kiếm ..." class="search form-control" name="title" style="display: inline"><p>
                        <input type='hidden' name='type' value='title'>
                        <input type="submit" class="col-md-2 btn btn-default" value="Search">
                        <!--<button class="icon-search">\</button>-->
                    </form>
				</li>
			</ul>
			<ul class="col-md-5 login_singin_area">
				@if(Session::has('current_user'))
					<li class="col-md-7">
						<a href="#"><p>XIN CHÀO <span class="user_name">{{ $user_name }}</span></p></a>

					</li>
                    <li class="col-md-4">
                        <span class="glyphicon glyphicon-bell"></span>
                        {{-- <span>{{$notifications['count_notifications']}}</span> --}}
                        
                        <ul class="notification hidden">
                            <li>Test noti 1</li>
                            <li>Test noti 2</li>
                            <li>Test noti 3</li>
                        </ul>
                    </li>
                        
                    </li>
					<li class='col-md-3'><a href="{{url('user/logout')}}">ĐĂNG XUẤT</a></li>
				@else
					<li class="col-md-7 login">
						<a><p>ĐĂNG NHẬP</p></a>
						@yield('login')
					</li>
					<li class="col-md-5" >
						<a href="{{Asset('signup')}}"><p>ĐĂNG KÝ</p></a>
						@yield('signup')
					</li>
				@endif
			</ul>
		</div>
		<div class="pop-up">
			<div class="wrapper">
	            <form action="{{url('user/ajax-login')}}" id="login-form" method="POST">
					<input type="text" name="account" placeholder="Nhập tài khoản">
					<input type="password" name="password" placeholder="Nhập mật khẩu">
	                <button class="submit">Đăng nhập</button>
				</form>
				<p class="error" style="text-align: center"></p>
				<span title="Click to close">x</span>
			</div>
		</div>
	</header>
    <div class="clearfix"></div>
    <nav>
        <div class="navi">
        	<div class="categories col-md-6">
	            <p class="menu_button"><span></span>Danh mục</p>
	            <div class="menu">
	                <ul>
	                    <li><a href="">Hot nhất</a></li>
	                    <li><a href="">Mới Nhất</a></li>
	                </ul>
	                <ul>
	                    @foreach($categories as $index => $category)
	                    <li><a href="{{Asset('category/view/'.$category->id)}}">{{$category->title}}</a></li>
	                    @endforeach
	                </ul>
	                
	            </div>
	        </div>
	        @if(Session::has('current_user'))
	        <div class='images-manage-buttons col-md-6 '>
                <p class="col-md-6 pull-right"><a  class="btn btn-danger upload_button" href="{{url('/user/upload')}}">Đăng đồ</a></p>
	            <p class="col-md-3 pull-right"><a class="btn btn-danger mypic_button" href="{{url('/user/view-products')}}">Đồ của tôi</a></p>
                @if(User::find(Session::get('current_user'))->is_admin == 1)
                <p class="col-md-3 pull-right"><a href='{{url('admin')}}'><button class='btn btn-default'>Admin page</button></a></p>
                @endif
	        </div>
        	@endif
        </div>
    </nav>
    <section>
        <div class="wrapper">
            @yield('content')
        </div>
        <aside>

        </aside>
    </section>
    <div class="clearfix"></div>
    <footer>
        <ul class="team_contact">
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Chính Sách Riêng Tư</a></li>
            <li><a href="">Hỗ Trợ</a></li>
            <li><a href="">Liên Hệ</a></li>
        </ul>
    </footer>
</body>
</html>