var stage = new Konva.Stage({
        container: 'container',
        width: 780,
        height: 658,
    });
function getImage(path)
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
    layer.batchDraw();
    };
    imageObj.src = path;
}