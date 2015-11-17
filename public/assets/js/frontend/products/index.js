$(document).ready(function () {

    $('.container').imagesLoaded(function () {
        var $container = $('.container');
        $container.masonry({
            itemSelector: '.item',
            columWidth: 200
        });
    });
});

