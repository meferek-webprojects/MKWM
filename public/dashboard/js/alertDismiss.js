$('body').bind('DOMSubtreeModified', function () {
    setTimeout(function () {
        $('.alert').fadeOut( "slow", function() {
            $('.alert').remove();
        });
    }, 7500);
});