<!DOCTYPE html>
<html>
<head>
	<title>Trang cá nhân</title>
	{{ HTML::style('public/assets/css/users/details.css') }}
    {{ HTML::style('public/assets/css/bootstrap.min.css') }}
    {{ HTML::style('public/assets/css/jquery-ui.min.css') }}
    {{ HTML::script('public/assets/js/jquery-1.11.3.min.js') }}
    {{ HTML::script('public/assets/js/jquery-ui.min.js') }}
    {{ HTML::script('public/assets/js/jquery.nicescroll.js') }}
    {{ HTML::script('public/assets/js/bootstrap.min.js') }}
    {{ HTML::script('public/assets/js/imagesloaded.js') }}
    {{ HTML::script('public/assets/js/masonry.pkgd.min.js')}}
    {{ HTML::script('public/assets/js/users/details.js') }}
</head>
<body>
	<header class='col-md-12'>
		<ul class="menu-left">
			<li>
				<a class="logo" href="#"><img src="{{'public/assets/images/logo1.png'}}"></a>
			</li>
			<li>
				<a href="{{url('home')}}">TRANG CHỦ</a>
			</li>
			<li>
				<a href="#">ẢNH</a>
			</li>
		</ul>
		<ul class="menu-right">
			<li class="avatar">
				<a href="#">
					<img src="{{'public/assets/images/vuong.png'}}"/>
				</a>
			</li>
			<li class="dropdown">
				<div class="box">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
          				<span class="glyphicon glyphicon-user">
          				</span>
       			 	</a>
       			</div>
			</li>
			<li>
				<a href="#">
          			<span class="glyphicon glyphicon-bell"></span>
       			 </a>
			</li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<div id="wrapper-header">
		<a href="#">
			<div id="header-right"	>
			</div>	
		</a>
		<a href="#">
			<div class="right">
				<div id="header-left-blog">
							
				</div>
				<div class="table">
					<span class="block-title">Blog của tôi</span>
					<span class="block-counter">0</span>
				</div>
			</div>
		</a>
		<a href="#">
			<div class="left">
				<div id="header-left-photo">
							
				</div>
				<span class="icon-camera"></span>
				<div class="table">
					<span class="block-title">Ảnh của tôi</span>
					<span class="block-counter">4</span>
				</div>
			</div>
		</a>
	</div>
	<div class="clearfix"></div>
	<div class="cover">
		
	</div>
	<div class="wrapper">
		<div class="left-wrap">
			<ul class="navi">
                <li class="my-images btn btn-info">Ảnh của tôi</li>
                <li class="my-action btn btn-info">Hoạt động</li>
                <li class="my-info btn btn-info">Về tôi</li>
            </ul>
            <div class="clearfix"></div>
            <!-- den content -->
            <div class="content">
            	<div class="myImages">
            		<div class="container-div">
						<ul>
							@foreach($data['albums'] as $index => $album)
                                @if($album->is_single == 0)
                                    @include('frontend/components/album', array('album' => $album))
                                @elseif($album->is_single == 1)
                                    @include('frontend/components/image', array('image' => $album->images->first()))
                                @endif
				            @endforeach
						</ul>
					</div>
            	</div>
            	<div class="myTimeline click row">
            	<!-- Chỗ này là phần hoạt động-->
            	Hoat dong
            	</div>
            	<div class="myProfile row">
					<div class="myInfo-left">
						<h3>Thông tin cá nhân</h3>
						<ul class="myInfo-box">
							<li>
					            <b>Họ tên:</b>
					            <span>Chưa cập nhật thông tin</span>
					        </li>
					        <li>
					            <b>Ngày sinh:</b>
					            <span>Chưa cập nhật thông tin ngày sinh</span>
					        </li>
					        <li>
					            <b>Giới tính:</b>
					            <span>Chưa cập nhật thông tin giới tính</span>
					        </li>
					        <li>
					            <b>Email:</b>
					            <span>Thông tin email ở trạng thái bảo mật.</span>
					        </li>
					        <li>
					            <b>Điện thoại:</b>
					            <span>phone number</span>
					        </li>
					    </ul>
            		</div>
            		<div class="about-right">
				        <h3>Vài nét về bản thân</h3>
				        <p>
				            <span>Dữ liệu đang cập nhật</span>
				        </p>
				    </div>
            	</div>

            </div>
		</div>
		<div class="right-wrap sidebar-box">
			<h4>
				<a href="#">NGOÀI XÓM</a>
			</h4>
			<div class="line"></div>
			<h5>
				<a href="#">XEM THÊM</a>
			</h5>
		</div>
	</div>
</body>
</html>