@extends('frontend/layout/master')
@section('title')
	Lời mời trao đổi
@stop
@section('content')
<div class="">
    <div class="overlay"></div>
    <div class="wrapper">
        <span title="Click to close">x</span>
        <h4>Chọn vật phẩm bạn muốn đổi</h4>
        <ul>
            
            <li>
                <input class="float_left" type="radio" name="my_product">
                <div class="img">
                    <img src="{{url('assets/images/test.jpg')}}" alt="">
                </div>
                <div class="title"><p>ABC XYZ</p></div>
            </li>
            <li>
                <input class="float_left" type="radio" name="my_product">
                <div class="img">
                    <img src="{{url('assets/images/test.jpg')}}" alt="">
                </div>
                <div class="title"><p>ABC XYZ</p></div>
            </li>
            <li>
                <input class="float_left" type="radio" name="my_product">
                <div class="img">
                    <img src="{{url('assets/images/test.jpg')}}" alt="">
                </div>
                <div class="title"><p>ABC XYZ</p></div>
            </li>
            <li>
                <input class="float_left" type="radio" name="my_product">
                <div class="img">
                    <img src="{{url('assets/images/test.jpg')}}" alt="">
                </div>
                <div class="title"><p>ABC XYZ</p></div>
            </li>
        </ul>
        <div class="submit"><button>Xác nhận</button></div>
    </div>
</div>
@stop
<!--
<script>
    $(document).ready(function(){
        $("a.exchange").click(function(){
            var obj = $(this);
            $.ajax({
               url: obj.attr('itemref'),
               type: 'GET',
               dataType: 'html',
               success: function(html){
                   
               }
            });
        });
    });
</script>-->
    