const showImagePositioner = (button, file) => {
    const imagePositioner = `
        <div class="positioner-background position-fixed">
            <div class="image-positioner mx-auto text-center mt-5 card px-4 py-5">
                <div class="placement-selector mx-auto">
                    <img src="`+file+`" alt="..." class="image">
                    <div class="image-box"></div>
                </div>
                <div class="image-position mt-5">
                    <input type="range" class="form-range" value="100" min="30" id="image-box-size">
                    X: <input type="text" class="form-control" value="50%" id="position-x" required>
                    Y: <input type="text" class="form-control" value="50%" id="position-y" required>
                    <input type="hidden" name="centered" id="centered-input">
                    <button class="btn btn-secondary mt-5" type="button" id="hide-positioner">Anuluj</button>
                    <button class="btn btn-primary mt-5" type="submit">Zapisz</button>
                </div>
            </div>
        </div>
    `;
    $(imagePositioner).insertAfter(button);

    $('.positioner-background').on('mousedown', () => {
        $('.positioner-background').on('mouseup', () => {
            $('.positioner-background').remove();
            $('.positioner-background').off('mouseup');
        })
    });

    $('.image-positioner').on('mousedown', event => {
        event.stopPropagation();
    });

    $('#hide-positioner').on('click', () => {
        $('.positioner-background').remove();
    });


    var image = $('.image');
    var imageWidth = image.width();
    var imageHeight = image.height();

    var imageBox = $('.image-box');

    imageBox.on('dragstart', () => {
        return false;
    });

    var inputPositionX = $('#position-x');
    var inputPositionY = $('#position-y');
    var inputImageBoxSize = $('#image-box-size');

    if(imageWidth < imageHeight)
        inputImageBoxSize.attr('max', imageWidth);
    else
        inputImageBoxSize.attr('max', imageHeight);

    inputPositionX.on('keyup', () => {
        imageBox.css('left', inputPositionX.val());
    });
    inputPositionY.on('keyup', () => {
        imageBox.css('top', inputPositionY.val());
    });

    var inputRangeValue = inputImageBoxSize.val();

    inputImageBoxSize.on('input', () => {
        imageBox.css({
            width: inputImageBoxSize.val(),
            height: inputImageBoxSize.val(),
            left: '+='+(inputRangeValue - inputImageBoxSize.val()) / 2,
            top: '+='+(inputRangeValue - inputImageBoxSize.val()) / 2,
        })
        
        inputRangeValue = inputImageBoxSize.val();

        if(imageBox.position().left > imageWidth - imageBox.outerWidth())
            imageBox.css('left', imageWidth - imageBox.outerWidth());

        if(imageBox.position().left < 0)
            imageBox.css('left', 0);

        if(imageBox.position().top > imageHeight - imageBox.outerHeight())
            imageBox.css('top', imageHeight - imageBox.outerHeight());

        if(imageBox.position().top < 0)
            imageBox.css('top', 0);
    });

    imageBox.on('mousedown', event => {
        var imageBoxWidth = imageBox.outerWidth();
        var imageBoxHeight = imageBox.outerHeight();

        var rect = event.target.getBoundingClientRect();
        var mouseStartX = event.clientX - rect.left + 0.5;
        var mouseStartY = event.clientY - rect.top + 0.5;

        var oldPositionX = imageBox.position().left - mouseStartX;
        var oldPositionY = imageBox.position().top - mouseStartY;

        $(document).on('mousemove', event => {
            var mouseX = event.clientX - rect.left + 0.5;
            var mouseY = event.clientY - rect.top + 0.5;

            var positionX = oldPositionX + mouseX;
            var positionY = oldPositionY + mouseY;

            if(positionX < 0) positionX = 0;
            if(positionX > imageWidth - imageBoxWidth) positionX = imageWidth - imageBoxWidth;
            if(positionY < 0) positionY = 0;
            if(positionY > imageHeight - imageBoxHeight) positionY = imageHeight - imageBoxHeight;
            
            imageBox.css({
                left: positionX+'px',
                top: positionY+'px'
            });

            inputPositionX.val(Math.round(positionX * 10) / 10+'px');
            inputPositionY.val(Math.round(positionY * 10) / 10+'px');

            var imageCenterPercentageX = Math.round((positionX + imageBoxWidth / 2) / imageWidth * 1000) / 1000;
            var imageCenterPercentageY = Math.round((positionY + imageBoxHeight / 2) / imageHeight * 1000) / 1000;

            $('#centered-input').val(imageCenterPercentageX+' '+imageCenterPercentageY);
        });

        $(document).on('mouseup', () => {
            $(document).off('mousemove');
        });
    });
}