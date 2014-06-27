function validate(obj)
{
	
	validateNonEmpty(obj);
	validateFormat(obj);
}	
function validateNonEmpty(obj)
{
	if(obj!=null)
	{
	if( obj.value=="" )
	{
		
		document.getElementById(""+obj.id+"_error").innerHTML="*Please enter a value";
		return false;
		}
		else{
		document.getElementById(""+obj.id+"_error").innerHTML="";
		return true;
		}
		}
}
function validateFormat(obj)
{
	var regex;
	var error="Invalid Format!";
	if(obj.value=="")
	return;
	if(obj.id=="name")
	{
	regex=/^[A-Za-z ]*$/;
	error+=" It should contain only alphabets";
	}

	else if(obj.id=="roll")
	{
	regex=/^[0-9]{9}$/;
	error=" It should be a 9 digit number";
}

	else if(obj.id=="password")
	{
	regex=/^.{6,}$/;
	error="Should contain atleast 6 characters";
}
	else if(obj.id=="cpassword")
	{
	 var p=document.getElementById("password");
	 if(p.value!=obj.value)	
	 document.getElementById("cpassword_error").innerHTML="*Passwords do not match!";
	 else
	 document.getElementById("cpassword_error").innerHTML="";
	 return;
	}

	else
	return;
	if(!regex.test(obj.value))
	document.getElementById(""+obj.id+"_error").innerHTML="*"+error;
	else
	document.getElementById(""+obj.id+"_error").innerHTML="";
	}