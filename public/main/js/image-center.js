const centerImage = (image, imageNaturalWidth, imageNaturalHeight) => {
    var centered = $(image).attr('image-center');
    var percentageCenteredX = centered.split(' ')[0];
    var percentageCenteredY = centered.split(' ')[1];

    if($(image).parent().width() == 0)
        var boxWidth = $(image).parent().parent().width();
    else
        var boxWidth = $(image).parent().width();

    var boxHeight = $(image).parent().height();

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

$('img[image-center]').each(function(){
    var img = document.createElement('img');
    img.src = this.src;
    img.onload = () => {
        centerImage(this, img.naturalWidth, img.naturalHeight);
    };
});

$(window).resize(() => {
    $('img[image-center]').each(function(){
        var img = document.createElement('img');
        img.src = this.src;
        img.onload = () => {
            centerImage(this, img.naturalWidth, img.naturalHeight);
        };
    });
})