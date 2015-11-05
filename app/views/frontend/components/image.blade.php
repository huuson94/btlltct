<li class="item-image image">
    <article>
        <a href='{{Asset('image/view/'.$image->id)}}'>
            <img src="{{url('public/'.$image->path)}}" alt="">
        </a>
        <div class="photo_content">
            <p class="title">Title: {{$image->album->title}}</p>
            <p class="user_by">{{$image->album->user->name}}</p>
            <div class="view">
                <span class="like"><i class="glyphicon glyphicon-heart"></i> {{$image->actions->sum('count_like')}}</span>
                <span class="share"><i class='glyphicon glyphicon-share'></i> {{$image->actions->sum('count_share')}}</span>
            </div>
        </div>
    </article>
</li>
