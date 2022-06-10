const centerImage = image => {
    var centered = $(image).attr('centered-percentage');
    var percentageCenteredX = centered.split(' ')[0];
    var percentageCenteredY = centered.split(' ')[1];

    var boxWidth = $(image).parent().width();
    var boxHeight = $(image).parent().height();

    var imageNaturalWidth = image.naturalWidth;
    var imageNaturalHeight = image.naturalHeight;

    var imageRatio = imageNaturalWidth / imageNaturalHeight;
    var boxRatio = boxWidth / boxHeight;
        
    if(imageRatio < boxRatio){
        var imageWidth = boxWidth;
        var imageHeight = imageWidth / imageRatio;
        
        var positionX = ((percentageCenteredY * imageHeight) - boxHeight) + boxHeight / 2;

        if(positionX < 0)
            $(image).css('object-position', '50% 0px');
        else
            $(image).css('object-position', '50% '+(-positionX)+'px');
    }else{
        var imageHeight = boxHeight;
        var imageWidth = imageHeight * imageRatio;

        var positionY = ((percentageCenteredX * imageWidth) - boxWidth) + boxWidth / 2;

        if(positionY < 0)
            $(image).css('object-position', '0px 50%');
        else
            $(image).css('object-position', (-positionY)+'px 50%');
    }
};

$('.center-image').on('load', function(){
    centerImage(this);
});

$(window).resize(() => {
    $('.center-image').each(function(){
        centerImage(this);
    });
})