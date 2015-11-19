$(window).ready(function () {
    //Effect for Signin
    $('.exchange').click(function () {
        $('.pop-up-exchange').removeClass("slideOutLeft").addClass("animated slideInDown");
        $('.pop-up-exchange').css("display", "block");
        $('body').css("position", "fixed");
    })
    $('.pop-up-exchange span').click(function () {
        $('.pop-up-exchange').addClass("slideOutLeft").removeClass("slideInDown");
        setTimeout(function () {
            $('.pop-up-exchange').css("display", "none");
        }, 600);
        $('body').css("position", "static");
    })
})