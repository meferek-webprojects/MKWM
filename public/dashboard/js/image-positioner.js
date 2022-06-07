const createImagePositioner = (button, file) => {
    var img = document.createElement('img');
    img.src = file;

    const imagePositioner = `
        <div class="positioner-background position-fixed">
            <div class="image-positioner mx-auto">
                <div class="image-box">
                    <img src="`+file+`" alt="..." id="image-to-center" style="object-position: 50% 50%;">
                </div>
                <div class="image-editor">
                    X: <input type="text" class="form-control" value="50%" id="position-x" required `+(img.height > img.width ? 'disabled' : '')+`>
                    Y: <input type="text" class="form-control" value="50%" id="position-y" required `+(img.width > img.height ? 'disabled' : '')+`>
                </div>
            </div>
        </div>
    `;
    $(imagePositioner).insertAfter(button);

    var imageBoxWidth = $('.image-box').css('width').replace('px', '');
    var imageBoxHeight = $('.image-box').css('height').replace('px', '');

    if(img.width > img.height){
        var imageWidth = Math.round(imageBoxHeight / img.height * img.width * 10) / 10;
        var imageHeight = imageBoxHeight;
    }else{
        var imageHeight = Math.round(imageBoxWidth / img.width * img.height * 10) / 10;
        var imageWidth = imageBoxWidth;
    }

    var imageToCenter = $('#image-to-center');
    var inputPositionX = $('#position-x');
    var inputPositionY = $('#position-y');

    $('.positioner-background').on('mousedown', () => {
        $('.positioner-background').on('mouseup', () => {
            $('.positioner-background').remove();
            $('.positioner-background').off('mouseup')
        })
    });

    $('.image-positioner').on('mousedown', event => {
        event.stopPropagation();
    });

    imageToCenter.on('dragstart', () => {
        return false;
    });

    imageToCenter.on('mousedown', event => {
        var rect = event.target.getBoundingClientRect();
        var mouseStartX = event.clientX - rect.left + 0.5;
        var mouseStartY = event.clientY - rect.top + 0.5;

        var oldPositionX = imageToCenter.css('object-position').split(' ')[0];
        var oldPositionY = imageToCenter.css('object-position').split(' ')[1];
        oldPositionX = (oldPositionX.includes('%') ? oldPositionX.replace('%', '') / 100 * (imageBoxWidth - imageWidth) : oldPositionX.replace('px', '')) - mouseStartX;
        oldPositionY = (oldPositionY.includes('%') ? oldPositionY.replace('%', '') / 100 * (imageBoxHeight - imageHeight) : oldPositionY.replace('px', '')) - mouseStartY;

        imageToCenter.on('mousemove', event => {
            var mouseX = event.clientX - rect.left + 0.5;
            var mouseY = event.clientY - rect.top + 0.5;

            var offsetX = oldPositionX + mouseX;
            var offsetY = oldPositionY + mouseY;
            if(offsetX > 0) offsetX = 0;
            if(offsetX < (imageBoxWidth - imageWidth)) offsetX = (imageBoxWidth - imageWidth);
            if(offsetY > 0) offsetY = 0;
            if(offsetY < (imageBoxHeight - imageHeight)) offsetY = (imageBoxHeight - imageHeight);

            var percentageOffsetX = (Math.round(offsetX / (imageBoxWidth - imageWidth) * 1000) / 10);
            var percentageOffsetY = (Math.round(offsetY / (imageBoxHeight - imageHeight) * 1000) / 10);
            if(percentageOffsetX < 0) percentageOffsetX = 0;
            if(percentageOffsetX > 100) percentageOffsetX = 100;
            if(percentageOffsetY < 0) percentageOffsetY = 0;
            if(percentageOffsetX > 100) percentageOffsetX = 100;
            
            if(imageWidth > imageHeight){
                imageToCenter.css('object-position', offsetX+'px 50%');
                inputPositionX.attr('value', percentageOffsetX+'%');
                inputPositionY.attr('value', '50%');
            }else{ 
                imageToCenter.css('object-position', '50% '+offsetY+'px');
                inputPositionX.attr('value', '50%');
                inputPositionY.attr('value', percentageOffsetY+'%');
            }
        });

        $(document).on('mouseup', () => {
            imageToCenter.off('mousemove')
        });
      
    });
}