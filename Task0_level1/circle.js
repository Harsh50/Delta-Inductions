
window.onload = rotate;

var ele=document.getElementById("ele");
var increase=0.05;
var angle=0;
var x,y;
x=parseInt(ele.style.left);
y=parseInt(ele.style.top);

function rotate()
{
 

x=150*Math.cos(angle)+250;
y=150*Math.sin(angle)+250;

ele.style.left=x+'px';
ele.style.top=y+'px';
angle+=increase;
setTimeout(rotate,1);

}