$(function(){
    var offset = $('#content').css('padding-top');
    offset = offset.substring(0, offset.length-2);
    $(window).scroll(function(){
        if ($(document).scrollTop() > offset) {
            $('.navbar-brand img').addClass('resizeImg');
            $('.navbar-default').addClass('resizeBackground');
            $('.navbar-default .navbar-nav > li > a').addClass('resizeLink');
            $('ul').addClass('resizeLinkBar');

        } else {
            $('.navbar-brand img').removeClass('resizeImg');
            $('.navbar-default').removeClass('resizeBackground');
            $('.navbar-default .navbar-nav > li > a').removeClass('resizeLink');
            $('ul').removeClass('resizeLinkBar');
        }
    });
});