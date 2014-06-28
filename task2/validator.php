<?php
session_start();
global $error;
global $pass_error,$cpass_error,$name_error,$roll_error,$captcha_error;

function validateNonEmpty()
{

		if(empty($_POST["name"])  or empty($_POST["roll"]) or empty($_POST["gender"]) or empty($_POST["password"]) or empty($_POST["cpassword"]))
		{
			global $error;
		$error="* Fields marked with asterisk cannot be empty";
		return false;
		}
else	 
return true;
}  
function validate()
{
	
	 $t1=validateName(); $t2=validatePass();
	$t3=validateRoll();
	$t4=validateCaptcha();
	if($t1 and $t2 and $t3 and $t4 )
	return true;
	
	
	else {return false;}
}	

function validateName()
{
	$name=htmlspecialchars(trim($_POST["name"]));

	
	if(!preg_match("/^[A-Za-z ]*$/",$name) and !empty($name))
	{ global $name_error;
	$name_error ="* Invalid format! It should contain only alphabets";
	 return false;
	}
	
	
	else 
	return true;
}	


function validatePass()
{
	$pass=htmlspecialchars(trim($_POST["password"]));
	$cpass=htmlspecialchars(trim($_POST["cpassword"]));
	$flag1=$flag2=0;
	
	if(!preg_match("/^.{6,}$/",$pass) and !empty($pass))
	{
		global $pass_error;
	 $pass_error="*Should contain atleast 6 characters";
	 $flag1=1;
	}
	if($pass!=$cpass and !empty($cpass))
	{global $cpass_error;
		$cpass_error="*Passwords do not match!";
	 $flag2=1;
		}
	if($flag1 or $flag2)
	return false;
	else 
	return true;
}

	  
function validateRoll()
{
$roll=htmlspecialchars(trim($_POST["roll"]));
	 if(!preg_match("/^[0-9]{9}$/",$roll))
 {
 	global $roll_error;
 $roll_error="* It should be a 9 digit number";
 return false;
 }
	$db=mysqli_connect("mysql1.000webhost.com","a5835261_harsh","nittrichy5","a5835261_student");
        $roll=mysqli_real_escape_string($db,$_POST["roll"]);
	if(mysqli_connect_errno())
	{
		echo "Error connecting to database:" . mysqli_connect_error();
		exit();
		}
	
	$sql="SELECT * from login where roll='".$roll."'";
	$data=mysqli_query($db,$sql);
	if(mysqli_num_rows($data)==1){ global $roll_error;
		$roll_error="* This roll no is already registered!";
		return false;

			}


	return true;

	}	
function validateCaptcha()
{
	$code=htmlspecialchars(trim($_POST["captcha"]));
	if(strcasecmp($_SESSION["security_code"],$code)!=0)
	{
		global $captcha_error;
		$captcha_error="* The code entered is incorrect";
		return false;
		
		}
	return true;
}
	
?>
