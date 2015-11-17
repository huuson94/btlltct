@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	Photo Upload
@stop
@section('content')
	<div class="upload_content">
		<div class="upload_left">
			<h1>Đăng ảnh</h1>
			<p class="note">Sử dụng nút <span>Chọn ảnh</span> để đăng ảnh cho sản phẩm của bạn!</p>
			<form action="{{url('home/do-upload')}}" id="do-upload">
				<ul>
					<li>
						<p>Chọn ảnh</p>
						<input type="file" name="img[]" accept="image/*" multiple>
					</li>
					<li>
						<p>Thể loại</p>
						<select name="category">
							<option valua="0" style="color:#76BD7A">--- Lựa chọn chuyên mục ---</option>
							<option value="1">Xe</option>
							<option value="2">Đồ gia dụng</option>
							<option value="3">Đồ điện lạnh</option>
							<option value="4">Bàn, ghế, kệ</option>
							<option value="5">Giường, tủ, đệm</option>
							<option value="6">Đạo cụ âm nhạc</option>
							<option value="7">Máy tính cũ</option>
							<option value="8">Nhà bếp</option>
							<option value="9">Khác</option>
						</select>
					</li>
					<li>
						<p>Tiêu đề</p>
						<input type="text" name="title" placeholder="Nội dung tiêu đề" id="album_name">
					</li>
					<li>
						<p>Thông tin mô tả</p>
						<textarea name="description" placeholder="Thông tin mô tả"></textarea>
					</li>
					
					<li>
						<button>Đăng ảnh</button>
					</li>
					<li>
						<p class="note">Sau khi điền đầy đủ các thông tin trên, bạn chọn "Đăng ảnh". Album ảnh sẽ được Ban quản trị của Hedspi.vn kiểm duyệt và sau đó được hiển thị trên trang chủ nếu không vi phạm quy định về đăng tải nội dung. Lưu ý: ảnh mới đăng sẽ hiển thị trong phần "Ảnh của tôi" với dòng chữ "Ảnh chưa được công bố"</p>
					</li>
				</ul>
			</form>
			
		</div>
		<div class="upload_right">
			
		</div>
	</div>
@stop
@section('script-bot')
	<script type="text/javascript">
		$(document).ready(function(){
			
		})
		$('#do-upload').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: $(this).attr('action'),
				data:  new FormData($('#do-upload')[0]) ,
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
			}).done(function(data){
				if(data=='fail'){
					alert('Bạn chưa lựa chọn chuyên mục');
				}else{
					alert('Thành công');
					window.location.href="{{url('home/my-images')}}";
				}
			}).fail(function(){
				alert('Bạn chưa chọn ảnh nào');
			})
		})
	</script>
@stop