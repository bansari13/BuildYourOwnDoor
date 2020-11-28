var stage, textureSelected = false, handleSelected = false;

function getFrame(path, id)
{
    stage = new Konva.Stage({
        container: 'container',
        width: 780,
        height: 758
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
    handleSelected = false;
    textureSelected = false;
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
    handleSelected = true;
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
    textureSelected = true;

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

function readImage() {
    if (!this.files || !this.files[0])
        return;

    const FR = new FileReader();
    FR.addEventListener("load", (evt) => {
        stage = new Konva.Stage({
            container: 'container',
            width: 780,
            height: 758
        });
        var layer = new Konva.Layer();

        // main API:
        var houseImage = new Image();

        houseImage.onload = function () {
            var house = new Konva.Image({
                image: houseImage,
                width: 756,
                height: 758,
                draggable: true
            });

            // add the shape to the layer
            layer.add(house);
            layer.batchDraw();
        };
        houseImage.src = evt.target.result;
        stage.add(layer);
    });
    FR.readAsDataURL(this.files[0]);
}


var width = window.innerWidth;
var height = window.innerHeight;

function update(activeAnchor) {
    var group = activeAnchor.getParent();

    var topLeft = group.get('.topLeft')[0];
    var topRight = group.get('.topRight')[0];
    var bottomRight = group.get('.bottomRight')[0];
    var bottomLeft = group.get('.bottomLeft')[0];
    var image = group.get('Image')[0];

    var anchorX = activeAnchor.getX();
    var anchorY = activeAnchor.getY();

    // update anchor positions
    switch (activeAnchor.getName()) {
        case 'topLeft':
            topRight.y(anchorY);
            bottomLeft.x(anchorX);
            break;
        case 'topRight':
            topLeft.y(anchorY);
            bottomRight.x(anchorX);
            break;
        case 'bottomRight':
            bottomLeft.y(anchorY);
            topRight.x(anchorX);
            break;
        case 'bottomLeft':
            bottomRight.y(anchorY);
            topLeft.x(anchorX);
            break;
    }

    image.position(topLeft.position());

    var width = topRight.getX() - topLeft.getX();
    var height = bottomLeft.getY() - topLeft.getY();
    if (width && height) {
        image.width(width);
        image.height(height);
    }
}
function addAnchor(group, x, y, name) {
    var layer = group.getLayer();

    var anchor = new Konva.Circle({
        x: x,
        y: y,
        stroke: '#666',
        fill: '#ddd',
        strokeWidth: 2,
        radius: 8,
        name: name,
        draggable: true,
        dragOnTop: false,
    });

    anchor.on('dragmove', function () {
        update(this);
        layer.draw();
    });
    anchor.on('mousedown touchstart', function () {
        group.draggable(false);
        this.moveToTop();
    });
    anchor.on('dragend', function () {
        group.draggable(true);
        layer.draw();
    });
    // add hover styling
    anchor.on('mouseover', function () {
        var layer = this.getLayer();
        document.body.style.cursor = 'pointer';
        this.strokeWidth(4);
        layer.draw();
    });
    anchor.on('mouseout', function () {
        var layer = this.getLayer();
        document.body.style.cursor = 'default';
        this.strokeWidth(2);
        layer.draw();
    });

    group.add(anchor);
}

function addCurrentImage(imagePath)
{
    var existingLayer = stage.getLayers()[1];
    if (typeof existingLayer !== 'undefined')
    {
        existingLayer.destroy();
    }
    var layer = new Konva.Layer();
    stage.add(layer);
    var darthVaderImg = new Konva.Image({
        width: 450,
        height: 600,
    });


    var darthVaderGroup = new Konva.Group({
        x: 180,
        y: 50,
        draggable: true,
    });
    layer.add(darthVaderGroup);
    darthVaderGroup.add(darthVaderImg);
    addAnchor(darthVaderGroup, 0, 0, 'topLeft');
    addAnchor(darthVaderGroup, 450, 0, 'topRight');
    addAnchor(darthVaderGroup, 450, 601, 'bottomRight');
    addAnchor(darthVaderGroup, 0, 601, 'bottomLeft');
    var imageObj1 = new Image();
    imageObj1.onload = function () {
        darthVaderImg.image(imageObj1);
        layer.draw();
    };
    imageObj1.src = imagePath;
}


function SendMail()
{
    $.ajax({
        type: "POST",
        url: "SendEmail.php",
        data: {
        },
        success: function (data) {
            console.log(data);
        }
    });
}

