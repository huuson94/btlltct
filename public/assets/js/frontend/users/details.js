$(document).ready(function(){
    var $container = $('.container-div');
    var temp=2;
    $('.my-images').click(function(){
    	$('body').find('.myImages').addClass('click');
    	if(temp==2){
    		$('body').find('.myTimeline').removeClass('click');
    	};
    	if (temp==3) {
    		$('body').find('.myProfile').removeClass('click');
    	};
    	temp = 1;
	    	
	    $container.imagesLoaded(function () {
	        $container.masonry({
	            itemSelector: '.item-image',
	            columWidth: 200
	        });
	    });
    });
    $('.my-action').click(function(){
    	$('body').find('.myTimeline').addClass('click');
    	if (temp==1) {
    		$('body').find('.myImages').removeClass('click');
    	};
    	if (temp==3) {
    		$('body').find('.myProfile').removeClass('click');
    	};
    	temp = 2;
    });
    $('.my-info').click(function(){
    	$('body').find('.myProfile').addClass('click');
    	if (temp==1) {
    		$('body').find('.myImages').removeClass('click');	
    	};
    	if (temp==2) {
    		$('body').find('.myTimeline').removeClass('click');
    	};
    	temp = 3;
    });

});