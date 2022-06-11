const centerImage = image => {
    var centered = $(image).attr('image-center');
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

        var positionY = ((percentageCenteredY * imageHeight) - boxHeight) + boxHeight / 2;

        if(positionY < 0)
            $(image).css('object-position', 'center top');
        else if(positionY > (imageHeight - boxHeight))
            $(image).css('object-position', 'center bottom');
        else
            $(image).css('object-position', 'center '+(-positionY)+'px');
    }else{
        var imageHeight = boxHeight;
        var imageWidth = imageHeight * imageRatio;

        var positionX = ((percentageCenteredX * imageWidth) - boxWidth) + boxWidth / 2;

        if(positionX < 0)
            $(image).css('object-position', 'left center');
        else if(positionX > (imageWidth - boxWidth))
            $(image).css('object-position', 'right center');
        else
            $(image).css('object-position', (-positionX)+'px center');
    }
};

// $('img[image-center]').on('load', function(){
//     centerImage(this);
// });

$(window).on('load', function(){
    $('img[image-center]').each(function(){
        centerImage(this);
    });
});

$(window).resize(() => {
    $('img[image-center]').each(function(){
        centerImage(this);
    });
})