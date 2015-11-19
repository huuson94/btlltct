$(document).ready(function () {
    //Effect for Menu
    var stt = 0;
    $('.categories .menu_button').click(function () {
        if (stt == 0) {
            $('.menu').fadeIn();
            stt = 1;
            $(this).addClass("clicked").find('span').addClass("clicked_span");
        } else {
            $('.menu').fadeOut();
            stt = 0;
            $(this).removeClass("clicked").find('span').removeClass("clicked_span");
        }
    })




    //NiceScroll
    $("html").niceScroll({
        zindex: 1000000,
        cursorborderradius: "0px",
        cursorcolor: "#868686",
        cursorwidth: "8px",
        cursorheight: "500px",
        cursorborder: "#868686",
        // autohidemode:false,
        background: 'rgba(186, 186, 186, 0.56)',
    });

    $(window).scroll(function () {
        var x = $(window).scrollTop();
        if (x > 50) {
            if ($('.categories').is(':visible'))
                $('.categories').fadeOut(300);
        } else {
            if (!$('.categories').is(':visible'))
                $('.categories').fadeIn(300);
        }

        if (x > 200) {
            $('.backtoTop').fadeIn();
        } else {
            $('.backtoTop').fadeOut();
        }
    });
    $('.backtoTop').click(function () {
        $('body').animate({'scrollTop': '0'}, 500);
    })
    //Effect for Login
    $('.login p').click(function () {
        $('.pop-up').removeClass("zoomOut").addClass("animated bounceInLeft");
        $('.pop-up').css("display", "block");
    })
    $('.pop-up span').click(function () {
        $('.pop-up').addClass("zoomOut").removeClass("bounceInLeft");
        setTimeout(function () {
            $('.pop-up').css("display", "none");
        }, 600);
    })

//			//Effect for Signin
//			$('.signin p').click(function(){
//				$('.pop-up-signin').removeClass("slideOutLeft").addClass("animated slideInDown");
//				$('.pop-up-signin').css("display","block");
//			})
//			$('.pop-up-signin span').click(function(){
//				$('.pop-up-signin').addClass("slideOutLeft").removeClass("slideInDown");
//				setTimeout(function(){
//					$('.pop-up-signin').css("display","none");
//				},600);
//			})

    /*****************************LOGIN FORM**************************/
    $('#login-form').submit(function (e) {
        e.preventDefault();
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),
            data: new FormData($('#login-form')[0]),
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
        }).done(function (data) {
            if (data == 'success') {
                $('.login .error').append('<p>* Đăng nhập thành công</p>');
                window.location.reload();
            } else {
                $('.login .error').append('<p>* Sai tài khoản hoặc mật khẩu</p>');
            }
        }).fail(function () {
            alert('Lỗi #TK01');
        })
    })
    
    
    
})

$(document).ready(function () {

            var container = document.querySelector('.msnry .scroll');
            var msnry=null;
            $('.msnry').imagesLoaded(function(){
                msnry = new Masonry( container, {
                    itemSelector: '.item',
                    columWidth:200
                });
            })

            var ias = $.ias({
              container: ".scroll",
              item: ".item",
              pagination: ".pagination",
              next: 'a[rel="next"]',
              delay: 600
            });

            ias.on('render', function(items) {
              $(items).css({ opacity: 0 });
            });

            ias.on('rendered', function(items) {
              msnry.appended(items);
            });
            ias.extension(new IASTriggerExtension({
                text: 'Load more items',
                offset: 2
            }));
            ias.extension(new IASSpinnerExtension({
                html: '<div class="ias-spinner"><p>Chờ xíu, đang tải ...</p></div>', 
            }));
            ias.extension(new IASNoneLeftExtension({
                html: '<div class="ias-noneleft"><p><em>Hết dữ liệu để tải !</em></p></div>'
            }));
});