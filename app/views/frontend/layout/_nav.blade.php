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
    <a href="{{url('user/'.Session::get('current_user').'/edit')}}" style="font-size: 18px;">Edit Info</a>
    <a href="{{url('exchange?u='.Session::get('current_user'))}}" style="font-size: 18px;">Exchange Requests</a>
    <a href="{{url('product/create')}}"><p class="upload_button"><i>â</i>Đăng sản phẩm</p></a>
    <a href="{{url('product?u='.Session::get('current_user'))}}"><p class="mypic_button">Sản phẩm đã đăng</p></a>
    @endif
</div>