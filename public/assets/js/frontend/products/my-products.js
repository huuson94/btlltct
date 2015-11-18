$(document).ready(function () {
    $('.container').imagesLoaded(function () {
        var $container = $('.container');
        $container.masonry({
            itemSelector: '.item',
            columWidth: 200
        });
    });

    //count like
    $('.like').click(function () {
        var x = $(this).find('span').text();
        if ($(this).find('i').text() == 'd') {
            $(this).find('i').text('c');
            x++;
            $(this).find('span').text(x);
        }
        else {
            $(this).find('i').text('d');
            x--;
            $(this).find('span').text(x);
        }
    })
})