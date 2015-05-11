$(document).ready(function($) {
    $('.find-out-more').on('click', function(event){
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $('#landing-two').position().top
        }, 1500, 'easeInOutCubic');
    });
});