<?php

function update_database()
{
	 $db=mysqli_connect("localhost","root","","students");
 	 
 
    if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  
  $roll = mysqli_real_escape_string($db, $_POST['roll']);
$password = sha1(mysqli_real_escape_string($db,$_POST['password']));
$name= mysqli_real_escape_string($db,$_POST['name']);

$gender = mysqli_real_escape_string($db,$_POST['gender']);
$dept =mysqli_real_escape_string($db,$_POST['dept']);

	$sql="INSERT INTO login (roll, password,name,gender,dept)
VALUES ('$roll','$password','$name','$gender','$dept')";
if (!mysqli_query($db,$sql)) {
  die('Error: ' . mysqli_error($db));
}
mysqli_close($db);
	
}