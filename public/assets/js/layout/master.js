$(document).ready(function(){
			//add libnary css
		    var $container = $('.container-div');
		    $container.imagesLoaded(function () {
		        $container.masonry({
		            itemSelector: '.item-image',
		            columWidth: 200
		        });
		    });

			//Effect for Menu
			var stt=0;
			$('.categories .menu_button').click(function(){
				if(stt == 0){
					$('.menu').fadeIn();//addClass("animated fadeInDown");
					stt=1;
					$('.menu').css("display","block").removeClass("fadeOutLeft");
					$(this).addClass("clicked").find('span').addClass("clicked_span");
					return false;
				}else{
					$('.menu').fadeOut();//addClass("fadeOutLeft");
					stt=0;
					$(this).removeClass("clicked").find('span').removeClass("clicked_span");
					return false;
				}
			});
			$('body').click(function(){
				if ($(this).find('.clicked')) {
					$('.menu').fadeOut();//addClass("fadeOutLeft");
					stt=0;
					$(this).removeClass("clicked").find('span').removeClass("clicked_span");
				};
			});
			//NiceScroll
			$("html").niceScroll({ 
				zindex: 1000000, 
				cursorborderradius: "4px", // Làm cong các góc của scroll bar
				cursorcolor: "#EA6A48", // Màu của scroll bar
				cursorwidth:"10px", // Kích thước bề ngang của scroll bar
				autohidemode:false   //Tắt chế độ tự ẩn của scroll bar
				});

			$(window).scroll(function(){
				var x=$(window).scrollTop();
//				if(x>40){
//					if($('.categories').is(':visible'))
//						$('.categories').fadeOut(300);
//				}else{
//					if(!$('.categories').is(':visible'))
//						$('.categories').fadeIn(300);
//				}
			});
			//Effect for Login
			$('.login p').click(function(){
				$('.pop-up').removeClass("zoomOut").addClass("animated bounceInLeft");
				$('.pop-up').css("display","block");
			});
			$('.pop-up span').click(function(){
				$('.pop-up').addClass("zoomOut").removeClass("bounceInLeft");
				setTimeout(function(){
					$('.pop-up').css("display","none");
				},600);
			});		
/*****************************LOGIN FORM**************************/
        $('#login-form').submit(function(e) {
            e.preventDefault();
            var obj = $(this);
			obj.next().html('');
			$.ajax({
				url: $(this).attr('action'),
				data: new FormData($('#login-form')[0]),
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
			}).done(function(data){
				if(data=='success'){
					obj.next().html('<p>* Đăng nhập thành công</p>');
					window.location.reload();
				}else{
					obj.next().html('<p>* Sai tài khoản hoặc mật khẩu</p>');
				}
			}).fail(function(){
				alert('* Sai tài khoản hoặc mật khẩu');
			});
		});        
		});