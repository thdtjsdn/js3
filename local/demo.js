
var gui;
var guiObj;
var stage;
var cross;
var shape;
var fc = '#E0E4CC';
var sc = '#53777A';

function init()
{
	stage = new JS3('js3-demo-canvas');
	stage.background = '#eee';
	stage.interactive = true;
	drawGui(); drawCirc(); drawCross();
}

function drawGui()
{
	guiObj = {
		'Draw Shape'        : 'Circle', 
		'X'					: 50,
		'Y'					: 50,
		'Fill Color'	 	: fc,
		'Stroke Color' 		: sc,
		'Tween'				: tweenShape
	}
	gui = new dat.GUI({ autoPlace: false });
	var s1 = gui.add(guiObj, 'Draw Shape', [ 'Circle', 'Rectangle', 'Triangle' ] );
		s1.onChange(function(val){setShape(val);});
	var s2 = gui.add(guiObj, 'X', 0, stage.width);
		s2.onChange(function(val){shape.x=val;})
	var s3 = gui.add(guiObj, 'Y', 0, stage.height);
		s3.onChange(function(val){shape.y=val;})
	var c1 = gui.addColor(guiObj, 'Fill Color');
		c1.onChange(function(val){shape.fillColor=fc=val;})
	var c2 = gui.addColor(guiObj, 'Stroke Color');
		c2.onChange(function(val){shape.strokeColor=sc=val;})
	gui.add(guiObj, 'Tween');		
	document.getElementById('datgui').appendChild(gui.domElement);	
}

function updateGui()
{
 	for (var i in gui.__controllers) gui.__controllers[i].updateDisplay();
}

function setShape(s)
{
	stage.clear();	
	switch(s){
		case 'Circle' : drawCirc(); break;
		case 'Rectangle' : drawRect(); break;
		case 'Triangle' : drawTri(); break;				
	}
}

function drawCirc()
{
	shape = new JS3Circle(getObjDefinition());
	stage.addChild(shape);
}

function drawRect()
{
	shape = new JS3Rect(getObjDefinition());
	stage.addChild(shape);
}

function drawTri()
{
	shape = new JS3Tri(getObjDefinition());
	stage.addChild(shape);	
}

function drawCross()
{
	cross = new JS3Image();
	cross.x = stage.width/2-(cross.width/2);
	cross.y = stage.height/2-(cross.height/2);
	cross.src = './local/cross.png';
	cross.drag = onDragChange;
	stage.addChild(cross);
}

function getObjDefinition()
{
	return {x:guiObj.X, y:guiObj.Y, size:50, fillColor:fc, strokeColor:sc, draggable:true}; 
//	draggable:true, click:onClick, dragStart:onDragStart, drag:onDragChange, dragComplete:onDragComplete};
}

function onDragChange(o)
{
	guiObj.X = o.x; guiObj.Y = o.y; updateGui();
}

function tweenShape()
{
	var x = cross.x + cross.width/2 - shape.width/2;
	var y = cross.y + cross.height/2 - shape.height/2
	stage.tween(shape, 1, {x:x, y:y});
}


window.onload = init;