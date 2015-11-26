<header>
	<div class="top">
	<h1>Photo</h1>
	<ul class="search_area">
		<li>
			<div class="logo">
				<a href="{{url('/')}}">
					<img src="{{url('public/assets/images/logo.png')}}" alt="logo">
				</a>
				</div>
		</li>
		<li>
			<a href="{{url('/')}}">HOME</a>
		</li>
		<li>
            <form action='{{url('product')}}' method='GET'>
			<input type="text" placeholder="Tìm kiếm ..." class="search" name='title'>
			<button type='submit' class="icon-search">\</button>
            </form>
		</li>
	</ul>
	<ul class="login_singin_area">
		@if(Session::has('current_user'))
            <li class="request_menu">
                <p>Menu <span>l</span></p>
                <ul>
                    <li>
                        <a href="{{url('product?u='.Session::get('current_user'))}}">Sản phẩm đã đăng</a>
                    </li>
                    <li>
                        <a href="{{url('exchange?u='.Session::get('current_user').'&action=send')}}">Yêu cầu đã gửi</a>
                    </li>
                    <li>
                        <a href="{{url('exchange?u='.Session::get('current_user').'&action=receive')}}">Yêu cầu đến</a>
                    </li>
                    @if(FEUsersHelper::isAdmin())
                        <li><a href="{{url('admin/')}}">Trang Admin</a></li>
                    @endif
                </ul>
            </li>
			<li class="login">
				<a href="{{url('user/'.Session::get('current_user').'/edit')}}">
					<p class="user_name">{{ User::find(Session::get('current_user'))->name }}</p>
				</a>
			</li>
			<li><a href="{{url('logout')}}">ĐĂNG XUẤT</a></li>
		@else
			<li class="login">
				<a ><p>ĐĂNG NHẬP</p></a>
				<div class="pop-up">
					<div class="wrapper">
						<form action="{{url('login')}}" id="login-form" method="POST">
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
				<a href="{{url('signup')}}"><p>ĐĂNG KÝ</p></a>
				<div class="pop-up-signin">
					<div class="wrapper">
						<form action="{{url('user')}}" method="POST" >
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
								<label>Xác nhận mật khẩu</label>
								<input type="password" name="password_confirm" placeholder="Nhập lại mật khẩu">
							</div>
							<div>
								<label>Nhập email</label>
								<input type="text" name="email" placeholder="Email( example@gmail.com )">
							</div>
							<div>
								<label>Nhập số điện thoại</label>
								<input type="text" name="phone" placeholder="Nhập số điện thoại">
							</div>
							
                            <a href="{{url('signup')}}">Đăng Ký </a>
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