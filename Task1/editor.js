	    var begin,selection,end;
function selectColor(color)

{      
document.getElementById("colour").style.visibility="hidden";
insert_tag("","");

       var textArea = document.getElementById('textarea');
       var text="";
       text=begin+"(c**:"+color+";'*#) "+selection+" (**/c)"+end;
       textArea.value=text;
       

}

function InitColorPalette() {
  var x;
  
    x = document.getElementsByTagName('TD');
  
  for (var i=0;i<x.length;i++)
  {
    x[i].onmouseover = over;
    x[i].onmouseout = out;
    x[i].onclick = click;
    x[i].style.backgroundColor=x[i].id;
    x[i].style.height="20px";
    x[i].style.width="20px";
  }
}
function show_colour()
{ var x=document.getElementById("colour");

if((x.style.visibility)=="visible")
 x.style.visibility="hidden";
 else
 x.style.visibility="visible";
}
function over()
{
this.style.border='2px dotted white';
}

function out()
{
this.style.border='1px solid gray';
}
function hide()
{
	document.getElementById("codes").style.visibility="hidden";
	document.getElementById("c").style.visibility="hidden";
	document.getElementById("output").style.visibility="hidden";}
function click()
{
  selectColor(this.id);
}
	        function view() {      //too many stars to make sure user doesnt enter those characters accidently
	           
	            var textArea = document.getElementById('textarea');
	            var d = document.getElementById('display');
	            var text="";
	            
	            text = textArea.value;
	             
	            // Make sure html and php tags are unusable by disabling < and >.
	           text = text.replace(/\</gi, "&lt");
	            text = text.replace(/\>/gi, "&gt");
	             
	            // Exchange newlines for <br />
	            text = text.replace(/\n/g, "<br />");
	             
	            // Basic BBCodes.
	            text = text.replace(/\(\*\*s\)/g, "<b>");
	            text = text.replace(/\(\/s\*\*\)/g, "</b>");
	             text = text.replace(/\(c\*\*/g, "<span style='color");
	            text = text.replace(/\(\*\*\/c\)/g, "</span>");
	            text = text.replace(/\*\#\)/g, ">");
	            text = text.replace(/\(\*\*i\)/g, "<i>");
	            text = text.replace(/\(\/i\*\*\)/g, "</i>");
	             
	            text = text.replace(/\(\*\*u\)/g, "<u>");
	            text = text.replace(/\(\/u\*\*\)/g, "</u>");
                    text = text.replace(/\(\*\*p\)/g, "<p>");
	            text = text.replace(/\(\/p\*\*\)/g, "</p>");
	            text=text.replace(/\(\*\*f\:a\)/g,"<span style='font-family:arial;'>");
text=text.replace(/\(\*\*f\:g\)/g,"<span style='font-family:Georgia;'>");
text=text.replace(/\(\*\*f\:c\)/g,"<span style='font-family:courier;'>");
text=text.replace(/\(\*\*\/f\)/g,"</span>");
for(var i=1;i<=7;i++)
{
var t="<span style='font-size:"+ i*5+"px;'>";
var reg=new RegExp("\\(\\*\\*sz\\:"+i+"\\)","g");

text=text.replace(reg, t);
}
text=text.replace(/\(\*\*\/sz\)/g,"</span>");
	            
	            
	             d.innerHTML = text;
	            d.style.visibility="visible";	            
	        }
var begin,selection,end;
	         
	        function insert_tag (val1,val2) {
	            
	            var textArea = document.getElementById('textarea');
	             
	            
	            if (typeof(textArea.selectionStart) != "undefined") {
	                
	                begin = textArea.value.substr(0, textArea.selectionStart);
	                selection = textArea.value.substr(textArea.selectionStart, textArea.selectionEnd - textArea.selectionStart);
	                end = textArea.value.substr(textArea.selectionEnd);
	                 
	                // Insert the tags between the three pieces of text.
	                textArea.value = begin + val1 + selection + val2 + end;
	            }
	            else
	            textArea.value="Browser doesn't support selections";
	        }

    function d(val1,val2)
{
       insert_tag("","");
       var textArea = document.getElementById('textarea');
       var text="";
       for(var i=0;i<selection.length;i++)
 {
     if(i%2==0)
     text+=selection.charAt(i).toUpperCase();
     else
     text+=selection.charAt(i).toLowerCase();}
      
      textArea.value=begin+val1+text+val2+end;
  
        
   }
   
   function view_code()
   {
   	document.getElementById("codes").style.visibility="visible";}
   
   var value;	
   function Select(id)
   {
   	var textArea=document.getElementById("textarea");
   	var index=document.getElementById(id).selectedIndex;
   	value=document.getElementById(id).options[index].value;
   	var val="";
       if(id=="fontname")
       {
       	
       	insert_tag("","");
       	textArea.value=begin+"(**f:"+value+")"+selection+"(**/f)"+end;
       	
       }   	
       else if(id=="fontsize")
       {
       	insert_tag("","");
       	textArea.value=begin+"(**sz:"+value+")"+selection+"(**/sz)"+end;
       	}
  }