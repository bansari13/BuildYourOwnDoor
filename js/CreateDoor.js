var stage,textureSelected=false,handleSelected=false;

function getFrame(path, id)
{
    stage = new Konva.Stage({
        container: 'container',
        width: 780,
        height: 658
    });
    var layer = new Konva.Layer();

    // main API:
    var frameImage = new Image();

    frameImage.onload = function () {
        var frame = new Konva.Image({
            x: 150,
            y: 35,
            image: frameImage,
            width: 450,
            height: 600
        });

        // add the shape to the layer
        layer.add(frame);
        layer.batchDraw();
    };
    frameImage.src = path;
    stage.add(layer);
    $('#frameID').val(id);
    createCookie("FrameID", id, "10");
    event.preventDefault();
    $('#step2').load('Designs.php');
    $('#reminderText').load('ReminderText.php');
    handleSelected=false;
    textureSelected=false;
}

var designLayer = new Konva.Layer();
function getDesign(path, id, doorID)
{
    var existingLayer = stage.getLayers()[1];
    if (typeof existingLayer !== 'undefined')
    {
        existingLayer.destroy();
    }
    stage.add(designLayer);
    // main API:
    var DesignImage = new Image();

    DesignImage.onload = function () {
        var design = new Konva.Image({
            x: 150,
            y: 35,
            image: DesignImage,
            width: 450,
            height: 600
        });

        // add the shape to the layer
        designLayer.add(design);
        designLayer.draw();
    };
    DesignImage.src = path;
    createCookie("DesignID", id, "10");
    createCookie("DoorID", doorID, "10");
    event.preventDefault();
    $('#reminderText').load('ReminderText.php');
    $('#step3').load('AddTexture.php');
}

var handleLayer = new Konva.Layer();
function getHandle(path)
{
    //If texture is selected stage is resetted
    
    //If we have texuture this becomes layer 1(Texture-Handle)
    if (typeof existingLayer !== 'undefined' && textureSelected)
    {
        var existingLayer = stage.getLayers()[1];
        existingLayer.destroy();
    }
    
    //Else this becomes layer 3(Frame-Design-Handle)
    else if (typeof existingLayer !== 'undefined' && !textureSelected)
    {
        var existingLayer = stage.getLayers()[3];
        existingLayer.destroy();
    }
    stage.add(handleLayer);
    // main API:
    var imageObj = new Image();
    imageObj.onload = function () {
        var yoda = new Konva.Image({
            x: 325,
            y: 260,
            image: imageObj,
            width: 100,
            height: 150
        });

        // add the shape to the layer
        handleLayer.add(yoda);
        handleLayer.draw();
    };
    imageObj.src = path;
    handleSelected=true;
}


var lockLayer = new Konva.Layer();
function getLock(path)
{
    //If texture is selected stage is resetted
    
    //If we have texuture and handle this becomes layer 2(Texture-Handle-Lock)
    if (typeof existingLayer !== 'undefined' && textureSelected && handleSelected)
    {
        var existingLayer = stage.getLayers()[2];
        existingLayer.destroy();
    }
    
    //If we have texuture and not handle this becomes layer 1(Texture-Lock)
    else if (typeof existingLayer !== 'undefined' && textureSelected && !handleSelected)
    {
        var existingLayer = stage.getLayers()[1];
        existingLayer.destroy();
    }
    
    //If we donot have texuture and handle is selected this becomes layer 3(Frame-Design-Handle-Lock)
    else if (typeof existingLayer !== 'undefined' && !textureSelected && handleSelected)
    {
        var existingLayer = stage.getLayers()[3];
        existingLayer.destroy();
    }
    
    //If we donot have texuture and not handle this becomes layer 2(Frame-Design-Lock)
    else if (typeof existingLayer !== 'undefined' && !textureSelected && !handleSelected)
    {
        var existingLayer = stage.getLayers()[2];
        existingLayer.destroy();
    }
    stage.add(lockLayer);
    // main API:
    var imageObj = new Image();
    imageObj.onload = function () {
        var yoda = new Konva.Image({
            x: 325,
            y: 260,
            image: imageObj,
            width: 100,
            height: 150
        });

        // add the shape to the layer
        lockLayer.add(yoda);
        lockLayer.draw();
    };
    imageObj.src = path;
}

function createCompositedCanvas(img1, img2) {
    debugger;
    // create canvas
    canvas = document.createElement("canvas");
    ctx = canvas.getContext("2d");
    canvas.width = 450;
    canvas.height = 600;
    //img1.style.backgroundColor = "rgba(0, 0, 0, 1)";
    // create a pattern  
    ctx.fillStyle = ctx.createPattern(img2, "repeat");
    // fill canvas with pattern
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // use blending mode lighter so that all the dimensions are preserved
    ctx.globalCompositeOperation = "lighter";
    // draw image on top
    ctx.drawImage(img1, 0, 0, canvas.width, canvas.height);
    // use composition mode destination-in to draw a cut-out sofa
    ctx.globalCompositeOperation = "destination-in";
    // draw image on top
    ctx.drawImage(img1, 0, 0, canvas.width, canvas.height);
    // use blending mode multiply to make it darker as the image is too light
    ctx.globalCompositeOperation = "multiply";
    // create a pattern  
    ctx.fillStyle = ctx.createPattern(img2, "repeat");
    // fill canvas with pattern
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // use composition mode destination-in to draw a cut-out sofa this time darker
    ctx.globalCompositeOperation = "destination-in";
    // draw to cut-out sofa
    ctx.drawImage(img1, 0, 0, canvas.width, canvas.height);

//    document.body.appendChild(canvas);
    return (canvas);
}
// end attibuted code


function AddTexture(texturePath, imagePath) {
    debugger;


    var img1 = new Image();
    img1.src = imagePath;

    var img2 = new Image();
    img2.src = texturePath;

    stage = new Konva.Stage({
        container: 'container',
        width: 780,
        height: 658
    });

    var layer = new Konva.Layer();
    stage.add(layer);
    var cnt = 2;
    img1.onload = img2.onload = function () {
        if (!--cnt)
        {
            var canvas = createCompositedCanvas(img1, img2);
            var img = new Konva.Image({
                x: 150,
                y: 35,
                image: canvas,
                width: 450,
                height: 600
            });
            layer.add(img);
            layer.draw();
        }
    };
    textureSelected=true;
    // create composited canvas

    // use the in-memory canvas as an image source for Konva.Image

//    var imageObj = new Image();
//    imageObj.onload = function () {
//        var yoda = new Konva.Image({
//            x: 150,
//            y: 35,
//            image: canvas,
//            width: 450,
//            height: 600
//        });
//
//        // add the shape to the layer
//        layer.add(yoda);
//        layer.draw();
//    };

//        }
//    }).done(function (o) {
//        console.log('saved');
//    });

}

function saveCustomerDesign()
{
    var imagebase64 = stage.toDataURL();
    $.ajax({
        type: "POST",
        url: "SaveImage.php",
        data: {
            img: imagebase64
        },
        success: function (data) {
            console.log(data);
            event.preventDefault();
            $('#step6').load('FinalStep.php');
        }
    });
}

