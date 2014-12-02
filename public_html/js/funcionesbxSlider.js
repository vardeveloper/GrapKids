// JavaScript Document
$(document).ready(function(){
    $('#sliderBanner').bxSlider({
//        speed: 500,
//        pager: true,
        mode: 'fade',
        captions: true,
        auto: true,
        controls: false,
        pause: 5000
    });
		
    $('#sliderPro').bxSlider({
        displaySlideQty: 3,
        moveSlideQty: 3,
        speed: 1500
//        infiniteLoop: false,
//        hideControlOnEnd: true
    });
});