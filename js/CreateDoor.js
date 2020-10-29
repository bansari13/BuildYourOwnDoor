var stage;
function getFrame(path, id)
{
    stage = new Konva.Stage({
        container: 'container',
        width: 780,
        height: 658,
    });
    var layer = new Konva.Layer();
    stage.add(layer);
    // main API:
    var imageObj = new Image();
    imageObj.onload = function () {
        var yoda = new Konva.Image({
            x: 150,
            y: 35,
            image: imageObj,
            width: 450,
            height: 600,
        });

        // add the shape to the layer
        layer.add(yoda);
        layer.draw();
    };
    imageObj.src = path;
    $('#frameID').val(id);
    createCookie("FrameID", id, "10");
    event.preventDefault();
    $('#step2').load('Designs.php');
}
function getDesign(path, id)
{
    var layer = new Konva.Layer();
    stage.add(layer);
    // main API:
    var imageObj = new Image();
    imageObj.onload = function () {
        var yoda = new Konva.Image({
            x: 150,
            y: 35,
            image: imageObj,
            width: 450,
            height: 600,
        });

        // add the shape to the layer
        layer.add(yoda);
        layer.draw();
    };
    imageObj.src = path;
    createCookie("DesignID", id, "10");
    event.preventDefault();
    $('#reminderText').load('ReminderText.php');
}

function createCompositedCanvas(img1, img2) {
    debugger;
    // create canvas
    canvas = document.createElement("canvas");
    ctx = canvas.getContext("2d");
    canvas.width = 450;
    canvas.height = 600;
    // create a pattern  
    ctx.fillStyle = ctx.createPattern(img2, "repeat");
    // fill canvas with pattern
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // use blending mode lighter so that all the dimensions are preserved
    ctx.globalCompositeOperation = "lighter";
    // draw sofa on top
    ctx.drawImage(img1, 0, 0, canvas.width , canvas.height );
    // use composition mode destination-in to draw a cut-out sofa
    ctx.globalCompositeOperation = "destination-in";
    // draw to cut-out sofa
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
    
    //document.body.appendChild(canvas);
    return (canvas);
}
// end attibuted code


function go() {
    debugger;
    stage = new Konva.Stage({
        container: 'container',
        width: 780,
        height: 658
    });
    var img1 = new Image();
//    img1.src = stage.toDataURL({
//        quality: 1.0
//    });
    img1.src = "images/png-20.png";
    var img2 = new Image();
    img2.src = "images/pattern1.png";
    var layer = new Konva.Layer();
    stage.add(layer);
    // create composited canvas
    var canvas = createCompositedCanvas(img1, img2);
    // use the in-memory canvas as an image source for Konva.Image
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

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

