
window.onload=function(){rotate();};
var ele=document.getElementById("ele");
var xor=parseInt(ele.offsetLeft);
	var yor=parseInt(ele.offsetTop);

var s=document.getElementById("r");


	
function rotate()
	{
	
	   var speed;
		var left=xor,top=yor;
					move_right();
			
		function move_right()
		{
			speed=parseFloat(s.value);
			left+=speed;
			ele.style.left=left+'px';
			if(left<350+xor)
			setTimeout(move_right,10);
			else
	
			move_down();
	}
	function move_down()
		{
			speed=parseFloat(s.value);
			top+=speed;
			ele.style.top=top+'px';
			if(top<200+yor)
			setTimeout(move_down,10);
			else
			move_left();
	}


 function move_left()
 {
 	   speed=parseFloat(s.value);
 	   left-=speed;
		ele.style.left=left+'px';
		if(left>xor)
		setTimeout(move_left,10);
		else
		move_up();
 	}
 	function move_up()
	{
		speed=parseFloat(s.value);
		top-=speed;
		ele.style.top=top+'px';
		if(top>yor)
		setTimeout(move_up,10);
		else
		move_right();
	}
}
