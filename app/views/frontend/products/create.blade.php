@extends('frontend/layout/master')
@section('width_70per')
	width_70per
@stop
@section('title')
	Đăng sản phẩm
@stop
@section('style-bot')
	<style type="text/css">
		.upload_left{
			width: 100%;
		}
	</style>
@stop
@section('content')
	<div class="upload_content">
		<div class="upload_left">
            <h1>Đăng sản phẩm mới</h1>
			<p class="note">Sử dụng nút <span>Chọn ảnh</span> để đăng ảnh cho sản phẩm của bạn!</p>
			<form action="{{url('product')}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" id="do-upload">
				<ul>
					<li>
						<p>Chọn ảnh</p>
						<input type="file" name="img[]" accept="image/*" multiple>
					</li>
					<li>
						<p>Thể loại</p>
						<select name="category">
							@foreach($categories as $index => $category)
							<option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
						</select>
					</li>
                    <li>
						<p>Địa chỉ</p>
						<select name="location">
							@foreach($locations as $index => $location)
							<option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
						</select>
					</li>
					<li>
						<p>Tiêu đề</p>
                        <input type="text" name="title" placeholder="Nội dung tiêu đề" id="title" required="true">
					</li>
					<li>
						<p>Thông tin mô tả</p>
						<textarea name="description" placeholder="Thông tin mô tả"></textarea>
					</li>
					<li>
						<p>Công khai<p>
                            <input type="checkbox" name="public" checked="true">
					</li>
					<li>
						<button>Đăng sản phẩm</button>
					</li>
					
				</ul>
			</form>
			
		</div>
		<div class="upload_right">
			
		</div>
	</div>
@stop
@section('script-bot')
<!--	<script type="text/javascript">
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
	</script>-->
@stop