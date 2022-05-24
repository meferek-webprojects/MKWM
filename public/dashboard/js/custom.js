$(window).on("load",function(){
    setTimeout(function(){
        $('#new-loader').fadeOut( "slow", function() {
            $('.alert').remove();
        });
    },1e3)
});