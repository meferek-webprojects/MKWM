// Page Loader

$(window).on("load",function(){
    setTimeout(function(){
        $('#new-loader').fadeOut( "slow", function() {
            $('#new-loader').remove();
        });
    },1e3)
});


// Active Page

var element = document.querySelector('[href="'+window.location.href+'"]');

element.classList.add('active');

element.closest('.accordion-menu > li').classList.add('active-page');

if(element.closest('.sub-menu .sub-menu')){
    $(window).on('load',function(){
        element.closest('.sub-menu').parentNode.querySelector('a').click();
    });
}