// const createImagePositioner = (button, file) => {
//     var img = document.createElement('img');
//     img.src = file;

//     const imagePositioner = `
//         <div class="positioner-background position-fixed">
//             <div class="image-positioner mx-auto">
//                 <div class="image-box">
//                     <img src="`+file+`" alt="..." id="edited-image" style="object-position: 50% 50%;">
//                 </div>
//                 <div class="image-editor">
//                     X: <input type="text" class="form-control" value="50%" id="position-x" required `+(img.width < img.height ? 'disabled' : '')+`>
//                     Y: <input type="text" class="form-control" value="50%" id="position-y" required `+(img.width > img.height ? 'disabled' : '')+`>
//                 </div>
//             </div>
//         </div>
//     `;
//     $(imagePositioner).insertAfter(button);

//     var imageBoxWidth = $('.image-box').css('width').replace('px', '');
//     var imageBoxHeight = $('.image-box').css('height').replace('px', '');

//     if(img.width > img.height){
//         var imageWidth = Math.round(imageBoxHeight / img.height * img.width * 10) / 10;
//         var imageHeight = imageBoxHeight;
//     }else{
//         var imageHeight = Math.round(imageBoxWidth / img.width * img.height * 10) / 10;
//         var imageWidth = imageBoxWidth;
//     }

//     var imageToCenter = $('#edited-image');
//     var inputPositionX = $('#position-x');
//     var inputPositionY = $('#position-y');

//     $('.positioner-background').on('mousedown', () => {
//         $('.positioner-background').on('mouseup', () => {
//             $('.positioner-background').remove();
//             $('.positioner-background').off('mouseup')
//         })
//     });

//     $('.image-positioner').on('mousedown', event => {
//         event.stopPropagation();
//     });

//     imageToCenter.on('dragstart', () => {
//         return false;
//     });

//     imageToCenter.on('mousedown', event => {
//         var rect = event.target.getBoundingClientRect();
//         var mouseStartX = event.clientX - rect.left + 0.5;
//         var mouseStartY = event.clientY - rect.top + 0.5;

//         var oldPositionX = imageToCenter.css('object-position').split(' ')[0];
//         var oldPositionY = imageToCenter.css('object-position').split(' ')[1];
//         oldPositionX = (oldPositionX.includes('%') ? oldPositionX.replace('%', '') / 100 * (imageBoxWidth - imageWidth) : oldPositionX.replace('px', '')) - mouseStartX;
//         oldPositionY = (oldPositionY.includes('%') ? oldPositionY.replace('%', '') / 100 * (imageBoxHeight - imageHeight) : oldPositionY.replace('px', '')) - mouseStartY;

//         imageToCenter.on('mousemove', event => {
//             // var mouseX = event.clientX - rect.left + 0.5;
//             // var mouseY = event.clientY - rect.top + 0.5;

//             // var positionX = oldPositionX + mouseX;
//             // var positionY = oldPositionY + mouseY;
//             // if(positionX > 0) positionX = 0;
//             // if(positionX < -(img.width - imageBoxWidth) - ($('.image-box').css('border-width').replace('px', '') * 2)) positionX = -(img.width - imageBoxWidth) - ($('.image-box').css('border-width').replace('px', '') * 2);
//             // if(positionY > 0) positionY = 0;
//             // if(positionY < -(img.height - imageBoxHeight) - ($('.image-box').css('border-width').replace('px', '') * 2)) positionY = -(img.height - imageBoxHeight) - ($('.image-box').css('border-width').replace('px', '') * 2);

//             // var percentagePositionX = (Math.round(positionX / (imageBoxWidth - imageWidth) * 1000) / 10);
//             // var percentagePositionY = (Math.round(positionY / (imageBoxHeight - imageHeight) * 1000) / 10);
//             // // if(percentagePositionX < 0) percentagePositionX = 0;
//             // // if(percentagePositionX > 100) percentagePositionX = 100;
//             // // if(percentagePositionY < 0) percentagePositionY = 0;
//             // // if(percentagePositionX > 100) percentagePositionX = 100;

//             // imageToCenter.css('object-position', positionX+'px '+positionY+'px');
            


//             var mouseX = event.clientX - rect.left + 0.5;
//             var mouseY = event.clientY - rect.top + 0.5;

//             var positionX = oldPositionX + mouseX;
//             var positionY = oldPositionY + mouseY;
//             if(positionX > 0) positionX = 0;
//             if(positionX < (imageBoxWidth - imageWidth)) positionX = (imageBoxWidth - imageWidth);
//             if(positionY > 0) positionY = 0;
//             if(positionY < (imageBoxHeight - imageHeight)) positionY = (imageBoxHeight - imageHeight);

//             var percentagePositionX = (Math.round(positionX / (imageBoxWidth - imageWidth) * 1000) / 10);
//             var percentagePositionY = (Math.round(positionY / (imageBoxHeight - imageHeight) * 1000) / 10);
//             if(percentagePositionX < 0) percentagePositionX = 0;
//             if(percentagePositionX > 100) percentagePositionX = 100;
//             if(percentagePositionY < 0) percentagePositionY = 0;
//             if(percentagePositionX > 100) percentagePositionX = 100;
            
//             if(imageWidth > imageHeight){
//                 imageToCenter.css('object-position', positionX+'px 50%');
//                 inputPositionX.attr('value', percentagePositionX+'%');
//                 inputPositionY.attr('value', '50%');
//             }else{ 
//                 imageToCenter.css('object-position', '50% '+positionY+'px');
//                 inputPositionX.attr('value', '50%');
//                 inputPositionY.attr('value', percentagePositionY+'%');
//             }
//         });

//         $(document).on('mouseup', () => {
//             imageToCenter.off('mousemove')
//         });
      
//     });
// }

// const createImagePositioner = (button, file) => {
//     var img = document.createElement('img');
//     img.src = file;

//     const imagePositioner = `
//         <div class="positioner-background position-fixed">
//             <div class="image-positioner mx-auto">
//                 <div class="image-box">
//                     <img src="`+file+`" alt="..." id="edited-image" style="object-position: 50% 50%;">
//                 </div>
//                 <div class="image-editor">
//                     X: <input type="text" class="form-control" value="50%" id="position-x" required `+(img.width < img.height ? 'disabled' : '')+`>
//                     Y: <input type="text" class="form-control" value="50%" id="position-y" required `+(img.width > img.height ? 'disabled' : '')+`>
//                 </div>
//             </div>
//         </div>
//     `;
//     $(imagePositioner).insertAfter(button);

//     var imageBoxWidth = $('.image-box').css('width').replace('px', '');
//     var imageBoxHeight = $('.image-box').css('height').replace('px', '');

//     if(img.width > img.height){
//         var imageWidth = Math.round(imageBoxHeight / img.height * img.width * 10) / 10;
//         var imageHeight = imageBoxHeight;
//     }else{
//         var imageHeight = Math.round(imageBoxWidth / img.width * img.height * 10) / 10;
//         var imageWidth = imageBoxWidth;
//     }

//     var imageToCenter = $('#edited-image');
//     var inputPositionX = $('#position-x');
//     var inputPositionY = $('#position-y');

//     $('.positioner-background').on('mousedown', () => {
//         $('.positioner-background').on('mouseup', () => {
//             $('.positioner-background').remove();
//             $('.positioner-background').off('mouseup')
//         })
//     });

//     $('.image-positioner').on('mousedown', event => {
//         event.stopPropagation();
//     });

//     imageToCenter.on('dragstart', () => {
//         return false;
//     });

//     imageToCenter.on('mousedown', event => {
//         var rect = event.target.getBoundingClientRect();
//         var mouseStartX = event.clientX - rect.left + 0.5;
//         var mouseStartY = event.clientY - rect.top + 0.5;

//         var oldPositionX = imageToCenter.css('object-position').split(' ')[0];
//         var oldPositionY = imageToCenter.css('object-position').split(' ')[1];
//         oldPositionX = (oldPositionX.includes('%') ? oldPositionX.replace('%', '') / 100 * (imageBoxWidth - imageWidth) : oldPositionX.replace('px', '')) - mouseStartX;
//         oldPositionY = (oldPositionY.includes('%') ? oldPositionY.replace('%', '') / 100 * (imageBoxHeight - imageHeight) : oldPositionY.replace('px', '')) - mouseStartY;

//         imageToCenter.on('mousemove', event => {
//             var mouseX = event.clientX - rect.left + 0.5;
//             var mouseY = event.clientY - rect.top + 0.5;

//             var positionX = oldPositionX + mouseX;
//             var positionY = oldPositionY + mouseY;
//             if(positionX > 0) positionX = 0;
//             if(positionX < -(img.width - imageBoxWidth) - ($('.image-box').css('border-width').replace('px', '') * 2)) positionX = -(img.width - imageBoxWidth) - ($('.image-box').css('border-width').replace('px', '') * 2);
//             if(positionY > 0) positionY = 0;
//             if(positionY < -(img.height - imageBoxHeight) - ($('.image-box').css('border-width').replace('px', '') * 2)) positionY = -(img.height - imageBoxHeight) - ($('.image-box').css('border-width').replace('px', '') * 2);

//             var percentagePositionX = (Math.round(positionX / (imageBoxWidth - imageWidth) * 1000) / 10);
//             var percentagePositionY = (Math.round(positionY / (imageBoxHeight - imageHeight) * 1000) / 10);

//             imageToCenter.css('object-position', positionX+'px '+positionY+'px');
//         });

//         $(document).on('mouseup', () => {
//             imageToCenter.off('mousemove')
//         });
      
//     });
// }

const showImagePositioner = (button, file) => {
    const imagePositioner = `
        <div class="positioner-background position-fixed">
            <div class="image-positioner mx-auto text-center">
                <div class="placement-selector mx-auto">
                    <img src="`+file+`" alt="..." class="image">
                    <div class="image-box"></div>
                </div>
                <div class="image-position">
                    <label for="image-box-size" class="form-label">Example range</label>
                    <input type="range" class="form-range" value="100" min="30" id="image-box-size">
                    X: <input type="text" class="form-control" value="50%" id="position-x" required>
                    Y: <input type="text" class="form-control" value="50%" id="position-y" required>
                    <button class="btn btn-warning" type="button" id="hide-positioner">Anuluj</button>
                    <button class="btn btn-primary" type="submit">Zapisz</button>
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

    $('.placement-selector').on('mousedown', event => {
        event.stopPropagation();
    });

    $('.image-position').on('mousedown', event => {
        event.stopPropagation();
    });

    $('#hide-positioner').on('click', () => {
        $('.positioner-background').remove();
    });


    var image = $('.image');
    var imageWidth = image.css('width').replace('px', '');
    var imageHeight = image.css('height').replace('px', '');

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

        if(imageBox.css('left').replace('px', '') > imageWidth - imageBox.css('width').replace('px', ''))
            imageBox.css('left', imageWidth - imageBox.css('width').replace('px', ''));

        if(imageBox.css('left').replace('px', '') < 0)
            imageBox.css('left', 0);

        if(imageBox.css('top').replace('px', '') > imageHeight - imageBox.css('height').replace('px', ''))
            imageBox.css('top', imageHeight - imageBox.css('height').replace('px', ''));

        if(imageBox.css('top').replace('px', '') < 0)
            imageBox.css('top', 0);
    });

    imageBox.on('mousedown', event => {
        var imageBoxWidth = imageBox.css('width').replace('px', '');
        var imageBoxHeight = imageBox.css('height').replace('px', '');

        var rect = event.target.getBoundingClientRect();
        var mouseStartX = event.clientX - rect.left + 0.5;
        var mouseStartY = event.clientY - rect.top + 0.5;

        var oldPositionX = imageBox.css('left').replace('px', '') - mouseStartX;
        var oldPositionY = imageBox.css('top').replace('px', '') - mouseStartY;

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

            var imageCenterPercentageX = (positionX + imageBoxWidth / 2) / imageWidth;
            var imageCenterPercentageY = (positionY + imageBoxHeight / 2) / imageHeight;
        });

        $(document).on('mouseup', () => {
            $(document).off('mousemove');
        });
    });
}

// var boxWidth;
// var boxHeight;
// var percentagePosition;
// var position;

// var differenceX = positionX / percentagePositionX;
// var imageWidth = differenceX + boxWidth;
// var imageCenterX = positionX + boxWidth / 2;
// var imageCenterPercentageX = imageCenterX / imageWidth;

// var differenceY = positionY / percentagePositionY;
// var imageHeight = differenceY + boxHeight;
// var imageCenterY = positionY + boxHeight / 2;
// var imageCenterPercentageY = imageCenterY / imageHeight;




// var imageCenterPercentageX;
// var imageCenterPercentageY;
// var boxWidth;
// var boxHeight;

// var imageCenterX = imageCenterPercentageX * imageWidth;
// var positionX = imageCenterX - boxWidth / 2;