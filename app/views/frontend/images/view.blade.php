@extends('frontend/layout/master')
@section('style-bot')
{{ HTML::style('public/assets/css/frontend/albums-images/view.css') }}
{{ HTML::style('public/assets/css/frontend/images/view.css') }}
@stop
@section('script-bot')
{{ HTML::script('public/assets/js/frontend/images/view.js') }}
{{ HTML::script('public/assets/js/frontend/albums-images/view.js') }}
<script type="text/javascript">
</script>
@stop
@section('title')
    Single Image Viewer
@stop
@section('content')
<div class="image_content row">
		<div class="image_left col-md-8">
            <article>
                <div class="detail_image_header">
                    <h2 class="detail_image_title">{{$image->title}}</h2>
                </div>
                <ul class="detail_image_info">
                    <li class="detail_image_info_date"><span >{{$image->updated_at}}</span></li>
                    <li class="detail_image_info_count_like"><span class="like"><i class="glyphicon glyphicon-heart"></i> <span>{{$image->count_like}}</span></span></li>
                    <li class="detail_image_info_count_share"><span class="share"><i class='glyphicon glyphicon-share'></i> <span>{{$image->count_share}}</span></span></li>
                </ul>
                <div class="photo_content">
                    <a href='{{Asset('image/view/'.$image->id)}}'>
                        <img class="img-rounded image-view" src="{{url('public/'.$image->path)}}" alt="{{$image->album->title}}">
                    </a>
                    <p>
                        <label class="caption">Caption: </label>
                        <span>{{$image->caption}}</span>
                    </p>
                </div>
            </article>
		</div>
		<div class="image_right col-md-4">
			<ul>
				<li>
					<p>ĐĂNG BỞI</p>
					<p>
                        <a href="#" class="user_name">{{$image->album->user->name}}</a>
                        <input type='hidden' id='user_id' value='{{$image->album->user->id}}'>
                        <input type='hidden' id='current_user' value='{{Session::get('current_user')}}'>
                        @if($image->album->user->id != Session::get('current_user') && Session::get('current_user'))
                            @if ($current_user->follow($image->album->user->id) == 0)
                                <button class="btn btn-success follow-btn" itemid='{{url('/user/ajax-follow')}}'>Follow</button>
                                <button class="btn btn-success unfollow-btn" itemid='{{url('/user/ajax-unfollow')}}' style='display: none'>Unfollow</button>
                            @elseif ($current_user->follow($image->album->user->id) == 1)
                                <button class="btn btn-success follow-btn" itemid='{{url('/user/ajax-follow')}}' style='display: none'>Follow</button>
                                <button class="btn btn-success unfollow-btn" itemid='{{url('/user/ajax-unfollow')}}'>Unfollow</button>
                            @endif
                        @endif
                    </p>
				</li>
				<li>
					<p>GIỚI THIỆU</p>
					<p>{{ $image->album['description'] }}</p>
				</li>
				<li>
					<p>CHUYÊN MỤC</p>
					<p>{{ $image->album->category->title}}</p>
				</li>
			</ul>
            @if(Session::has('current_user'))
            <form action="{{url('user/ajax-comment')}}" id="comment-form" method="POST">
                <input type="hidden" name="post_id" value="{{$image->id}}">
                <input type="hidden" name="type" value="2">
                <ul>
                    <li>
                        <p>BÌNH LUẬN</p>
                        <textarea class="form-control" name="commentContent" placeholder="Viết bình luận của bạn..."></textarea>
                    </li>
                    <li>
                        <button class="btn btn-danger" name="submit">Bình luận</button>
                    </li>
                </ul>
            </form>
            @else
                <ul>
                    <li>
                        <p>(Đăng nhập để có thể bình luận ...)</p>
                    </li>
                </ul>  
            @endif
            <div class="detailBox">
                <div class="titleBox">
                    <label>Comment Box</label>
                    <span>(Click để thu gọn)</span>
                </div>
                <div class="actionBox">
                    <ul class="commentList">
                        @foreach ($image->comments as $comment)
                        <li>
                            <!-- <div class="commenterImage">
                                <img src="http://lorempixel.com/50/50/people/6" />
                            </div> -->
                            <p>{{$comment->user->name}}</p>
                            <div class="commentText">
                                <p class="">{{$comment->content}}</p>
                                <span class="date sub-text">on {{$comment->created_at}}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
		</div>
	</div>
@stop