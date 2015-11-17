<script type="text/javascript">
		$(document).ready(function(){
			//Effect for Menu
			var stt=0;
			$('.categories .menu_button').click(function(){
				if(stt == 0){
					$('.menu').fadeIn();
					stt=1;
					$(this).addClass("clicked").find('span').addClass("clicked_span");
				}else{
					$('.menu').fadeOut();
					stt=0;
					$(this).removeClass("clicked").find('span').removeClass("clicked_span");
				}
			})

			
			

			//NiceScroll
			$("html").niceScroll({ 
				zindex: 1000000, 
				cursorborderradius: "0px", 
				cursorcolor: "#868686",
				cursorwidth:"8px",
				cursorheight:"500px",
				cursorborder:"#868686",
				// autohidemode:false,
				background: 'rgba(186, 186, 186, 0.56)',
				});

			$(window).scroll(function(){
				var x=$(window).scrollTop();
				if(x>50){
					if($('.categories').is(':visible'))
						$('.categories').fadeOut(300);
				}else{
					if(!$('.categories').is(':visible'))
						$('.categories').fadeIn(300);
				}

				if(x>200){
					$('.backtoTop').fadeIn();
				}else{
					$('.backtoTop').fadeOut();
				}
			});
				$('.backtoTop').click(function(){
					$('body').animate({'scrollTop':'0'},500);
				})
			//Effect for Login
			$('.login p').click(function(){
				$('.pop-up').removeClass("zoomOut").addClass("animated bounceInLeft");
				$('.pop-up').css("display","block");
			})
			$('.pop-up span').click(function(){
				$('.pop-up').addClass("zoomOut").removeClass("bounceInLeft");
				setTimeout(function(){
					$('.pop-up').css("display","none");
				},600);
			})
				
			//Effect for Signin
			$('.signin p').click(function(){
				$('.pop-up-signin').removeClass("slideOutLeft").addClass("animated slideInDown");
				$('.pop-up-signin').css("display","block");
			})
			$('.pop-up-signin span').click(function(){
				$('.pop-up-signin').addClass("slideOutLeft").removeClass("slideInDown");
				setTimeout(function(){
					$('.pop-up-signin').css("display","none");
				},600);
			})
		})

/*****************************LOGIN FORM**************************/
		$('#login-form').submit(function(e) {
			e.preventDefault();
			$('.error').html('');
			$.ajax({
				url: $(this).attr('action'),
				data: new FormData($('#login-form')[0]),
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
			}).done(function(data){
				if(data=='success'){
					$('.login .error').append('<p>* Đăng nhập thành công</p>');
					window.location.reload();
				}else{
					$('.login .error').append('<p>* Sai tài khoản hoặc mật khẩu</p>');
				}
			}).fail(function(){
				alert('Lỗi #TK01');
			})
		})

/*****************************SIGNIN FORM**************************/
		$('#signin-form').submit(function(e) {
			e.preventDefault();
			$('.error').html('');
			$('#signin-form div p').remove();
			$.ajax({
				url: $(this).attr('action'),
				data: new FormData($('#signin-form')[0]),
				type: 'POST',
				contentType: false,
				processData: false,
				cache: false,
			}).done(function(data){
				if(data=='success'){
					$('.signin .error').append('<p>* Đăng ký thành công! Chuyển về trang chủ để đăng nhập</p>');
					window.location.reload();
				}else if(data=='fail'){
					$('.signin input[name="account"]').after('<p>* Tài khoản đã tồn tại</p>');
				}else{
					var msg=$.parseJSON(data);
					$.each(msg,function(key,val){
						if( key=='name' )
							$('.signin input[name="name"]').after('<p>*'+val+'</p>');
						if( key=='account' )
							$('.signin input[name="account"]').after('<p>*'+val+'</p>');
						if( key=='password' )
							$('.signin input[name="password"]').after('<p>*'+val+'</p>');
						if( key=='email' )
							$('.signin input[name="email"]').after('<p>*'+val+'</p>');
						if( key=='phone' )
							$('.signin input[name="phone"]').after('<p>*'+val+'</p>');
						if( key=='address' )
							$('.signin input[name="address"]').after('<p>*'+val+'</p>');
					})
				}
			}).fail(function(){
				alert('Lỗi #TK01');
			})
		})
	</script>