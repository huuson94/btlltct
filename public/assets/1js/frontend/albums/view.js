$(document).ready(function(){
	//NiceScroll
	$(".commentList").niceScroll({ 
		zindex: 1000000, 
		cursorborderradius: "4px", // Làm cong các góc của scroll bar
		cursorcolor: "#EA6A48", // Màu của scroll bar
		cursorwidth:"10px", // Kích thước bề ngang của scroll bar
		autohidemode:true   //Tắt chế độ tự ẩn của scroll bar
	});
	var kt=0;
	$('.titleBox').click(function(){
		$('.actionBox').toggle();
		if (kt==0) {
			$('.titleBox span').text('(Click để xem	)');
			kt=1;
		}else{
			$('.titleBox span').text('(Click để thu gọn)');
			kt=0;
		};
	});
	
//        $("div.image_left").smoothDivScroll({
//                autoScrollingMode: "onStart"
//        });
	
});