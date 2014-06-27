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

	
	if(!preg_match("/^[A-Za-z ]*$/",$fname) and !empty($fname))
	{ global $fname_error;
	$fname_error ="* Invalid format! It should contain only alphabets";
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

function validateFile()
{
	if($_FILES['photo']['name'])
	{
		if(!$_FILES['photo']['error'])
	   {
	   	 $file_name=$_FILES['photo']['tmp_name'];
	   	 if($_FILES['photo']['size'] > 200000) //can't be larger than 200 KB
		  {
			global $file_error;
			$file_error="* File size should be less than 200KB!";
			return false;
		  }
		  $currentdir = getcwd();
        $target = $currentdir."/uploads/".$_POST["username"].strtolower($_FILES['photo']['name']);
        
		  move_uploaded_file($_FILES['photo']['tmp_name'], $target);
		  return true;
		  }
		  
		  else {
		  	global $file_error;
		  	$file_error=$_FILES['photo']['error'];
		  	return false;
		  	}
	}
	return true;
}	  
function validateRoll()
{
	$db=mysqli_connect("localhost","root","","students");
	if(mysqli_connect_errno())
	{
		echo "Error connecting to database:" . mysqli_connect_error();
		exit();
		}
	$roll=mysqli_real_escape_string($db,$_POST["roll"]);
	$sql="SELECT * from login where roll='".$roll."'";
	$data=mysqli_query($db,$sql);
	if(mysqli_num_rows($data)==1){ global $user_error;
		$user_error="* This roll no is already registered!";
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