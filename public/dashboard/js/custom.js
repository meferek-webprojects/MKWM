$(window).on("load",function(){
    setTimeout(function(){
        $('#new-loader').fadeOut( "slow", function() {
            $('#new-loader').remove();
        });
    },1e3)
});