


<?php 

include_once("validator.php");
include_once("update.php");
if(isset($_POST['submitted']))
{
$f1=validateNonEmpty();$f2=validate();
if($f1 and $f2)
{
	update_database();
	header("Location:thanku.htm");
		
}

}
function autocomplete($name)
{
	if(isset($_POST[$name]))
   return htmlspecialchars(trim($_POST[$name]));
   
   return "";	
	}
	?>
<!doctype html>
<html>






<head>
<meta charset="utf-8" ></meta>
<title>Registration</title>
<style type="text/css">
body{
	font-family:sans-serif;
	font-size:18px;}
input,select[name="dept"],textarea[name="interests"]{
	position:absolute;
	left:20%;}
	span[class="error"]{position: absolute;
	color:red;
	font-size: 14px;
left:40%;
	font-weight: bold;}
	span[class="gerror"]{
	color:red;
	font-weight: bold;
	font-size: 16px;	
		}

	input:hover{
		background-color: lightgrey;}
input[type="radio"]
{
	position:absolute;
	left:auto;
	}
</style>


<script type="text/javascript" src="validator.js" ></script>

</head>
<body>
<h4 style="color:red;">*required fields</h4>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>





<div class='container'>
<span class="gerror"><?php global $error;echo $error;?></span><br /><br />
    <label for='name' >Name *: </label>
    <input type='text' name='name' id='name' value='<?php echo autocomplete("name"); ?>'   onblur="validate(this)" required/>
    <span id='name_error' class='error'><?php echo $name_error?></span><br/><br/>

    
    <label for='gender' >Gender*:</label>
    
    <input id="radio1" type="radio" name="gender" value="Male" required/>&nbsp&nbsp&nbsp&nbsp&nbsp<label for="radio1">Male</label>
    <input id="radio2" type="radio" name="gender" value="Female" required/>&nbsp&nbsp&nbsp&nbsp&nbsp<label for="radio2">Female</label>
    <span id='gender_error' class='error'></span><br /><br />
    

    <label for='roll' >Roll Number *:</label>
    <input type='text' name='roll' id='roll' value='<?php echo autocomplete("roll"); ?>' required onblur="validate(this)"/>
    <span id='roll_error' class='error'><?php echo $roll_error?></span><br/><br/>


    <label for='password' >Password*:</label>
    
    
    <input type='password' name='password' id='password' onblur="validate(this)" required/>
<span id='password_error' class='error'><?php echo $pass_error?></span>
   <br/><br/>
    <label for='cpassword' >Confirm Password*:</label>
    <input type="password" name="cpassword" id="cpassword" required onblur="validate(this)"/>
    <span id='cpassword_error' class='error'><?php echo $cpass_error?></span><br/><br/>
    
    <label for='dept' >Department*:</label>
    <select name="dept" required>
    
    <option value="cse">Computer Science and Engineering</option>
    <option value="ece">Electronic and Communication Engineering</option>
    <option value="mech">Mechanical Engineering</option>
    <option value="eee">Electrical and Electronics Engineering</option>
    <option value="meta">Metallurgy and Materials Engineering</option>
    <option value="prod">Production Engineering</option>
    <option value="chem">Chemical Engineering</option>
    <option value="civil">Civil Engineering</option></select>
    
  <br/> <br/><br/><br/>
   <img style="position:absolute;left:20%;" id="captcha_image" src="create_image.php"></img><br /><br /><br />
   <label for='captcha' >Enter the code* :</label>
    <input type="text" id="captcha" name="captcha"/><span id='captcha_error' class='error'><?php echo $captcha_error?></span><br><br>
   <br /><input type='submit' id='submit' value='Submit' /><br/>
</div>

</fieldset>



</form>
</body>
</html>