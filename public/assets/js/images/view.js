$(document).ready(function () {
    //NiceScroll
    $(".commentList").niceScroll({
        zindex: 1000000,
        cursorborderradius: "4px", // Làm cong các góc của scroll bar
        cursorcolor: "#EA6A48", // Màu của scroll bar
        cursorwidth: "10px", // Kích thước bề ngang của scroll bar
        autohidemode: true   //Tắt chế độ tự ẩn của scroll bar
    });
    var kt = 0;
    $('.titleBox').click(function () {
        $('.actionBox').toggle();
        if (kt == 0) {
            $('.titleBox span').text('(Click để xem	)');
            kt = 1;
        } else {
            $('.titleBox span').text('(Click để thu gọn)');
            kt = 0;
        }
        ;
    });
    
    $('#comment-form').submit(function (e) {

        if ($('textarea.form-control').val()!='') {
            var formData = new FormData($('#comment-form')[0]);
            e.preventDefault();
            var obj = $(this);
            $.ajax({
                url: $(this).attr('action'),
                data: formData,
                dataType: 'JSON',
                type: 'POST',
                contentType: false,
                processData: false,
                cache: false,
            }).done(function (data) {
                // alert('comment thanh cong');
                var cmt_content=$('textarea.form-control').val();
                var str = "<li><p>"+data.user_name+"</p><div class=\"commentText\"><p>"+data.content+"</p><span class=\"date sub-text\">on"+data.updated_at+"</span></div></li>";
                $('ul.commentList').prepend(str);
                $('.form-control').attr('placeholder','Viết bình luận của bạn...');
                $('.form-control').val('');
            }).fail(function () {
                alert('* Bạn không có quyền bình luận !');
            });
        }else{
            $('.form-control').attr('placeholder','Bạn cần nhập nội dung trước khi bình luận !!!');
            return false;
        };
        

    });
})