<header>
	<div class="top">
	<h1>Photo</h1>
	<ul class="search_area">
		<li>
			<div class="logo">
				<a href="{{url('/home')}}">
					<img src="{{url('assets/images/logo.png')}}" alt="logo">
				</a>
				</div>
		</li>
		<li>
			<a href="{{url('/home')}}">HOME</a>
		</li>
		<li>
			<input type="text" placeholder="Tìm kiếm ..." class="search">
			<button class="icon-search">\</button>
		</li>
	</ul>
	<ul class="login_singin_area">
		@if(Session::has('my_user'))
			<li class="login">
				<a href=""><p class="user_name">{{ Session::get('my_user')['name'] }}</p></a>
			</li>
			<li><a href="{{url('home/logout')}}">ĐĂNG XUẤT</a></li>
		@else
			<li class="login">
				<a><p>ĐĂNG NHẬP</p></a>
				<div class="pop-up">
					<div class="wrapper">
						<form action="{{url('home/do-login')}}" id="login-form">
							<label>Nhập tài khoản</label>
							<input type="text" name="account" placeholder="Nhập tài khoản">
							<label>Nhập mật khẩu</label>
							<input type="password" name="password" placeholder="Nhập mật khẩu">
							<button>Đăng nhập</button>
						</form>
						<p class="error"></p>
						<span title="Click to close">x</span>
					</div>
				</div>
			</li>
			<li class="signin">
				<a><p>ĐĂNG KÝ</p></a>
				<div class="pop-up-signin">
					<div class="wrapper">
						<form action="{{url('home/do-signin')}}" id="signin-form">
							<div>
								<label>Nhập tên đầy đủ</label>
								<input type="text" name="name" placeholder="Họ và tên">
							</div>
							<div>
								<label>Nhập tên tài khoản</label>
								<input type="text" name="account" placeholder="Nhập tài khoản">
							</div>
							<div>
								<label>Nhập mật khẩu</label>
								<input type="password" name="password" placeholder="Nhập mật khẩu">
							</div>
							<div>
								<label>Nhập email</label>
								<input type="text" name="email" placeholder="Email( example@gmail.com )">
							</div>
							<div>
								<label>Nhập số điện thoại</label>
								<input type="text" name="phone" placeholder="Nhập số điện thoại">
							</div>
							<div>
								<label>Nhập địa chỉ</label>
								<input type="text" name="address" placeholder="Nhập địa chỉ">
							</div>
							<button>Đăng Ký</button>
						</form>
						<p class="error"></p>
						<span title="Click to close">x</span>
					</div>
				</div>
			</li>
		@endif
	</ul>
	</div>
</header>