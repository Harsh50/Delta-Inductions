<?php
session_start();
$file_error="";
$rollno="";
<?php
$firstname=$lastname=$dp=$interest=$birth=$gender=$dept="";
if(isset($_SESSION['user'])
{
	$roll=$_SESSION['user'];
	$db=mysqli_connect("localhost","root","","students");
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
  } 
  
		$sql="SELECT * from login where roll='".$roll."'";
		$data=mysqli_query($db,$sql);
		$info=mysqli_fetch_assoc($data);
			
		
				$name=$info["name"];
			
				$gender=$info["gender"];
				switch($info["dept"])
				{
					case 'cse':$dept="Computer Science and Engineering";
					           break;
					 case 'mech':$dept="Mechanical Engineering";
					           break;
					           case 'meta':$dept="Metallurgy and materials and Engineering";
					           break;
					           case 'ece':$dept="Electronics and Commnications Engineering";
					           break;
					           case 'chem':$dept="Chemical Engineering";
					           break;
					           case 'eee':$dept="Electrical and Electronics Engineering";
					           break;
              case 'prod':$dept="Production Engineering";
					           break;
          
					
					}
				
				
	
	
	
	
	}
	else {
		
	 header("Location:index.php",true,303);
	 die();
		
		}

if(isset($_FILES['photo']['name']))
	{
		if(!$_FILES['photo']['error'])
	   {
	   	 $file_name=$_FILES['photo']['tmp_name'];
	         if($_FILES['photo']['size'] > (2*1024000))
	   	 $file_error="* File size should be less than 2 MB!";
	   	 
	   	 else if( !(($_FILES["photo"]["type"] == "image/jpeg")|| ($_FILES["photo"]["type"] == "image/jpg")
		|| ($_FILES["photo"]["type"] == "image/pjpeg")
		|| ($_FILES["photo"]["type"] == "image/x-png")
		|| ($_FILES["photo"]["type"] == "image/png")) )
		  {
			
			$file_error="* File format invalid!";
			
		  }
		  else{
		  $dirpath=getcwd()."/"."uploads/".$rollno."/";
		  if(!file_exists($dirpath))
		  mkdir($dirpath);
		 
        $target = getcwd()."/uploads/".$rollno."/".$rollno.".png";
        
		  move_uploaded_file($_FILES['photo']['tmp_name'], $target);
		  }
		  
		}
		  
		  else {
		  	
		  	$file_error=$_FILES['photo']['error'];
		  	return false;
		  	}
	}
?>
<!doctype html>
<head>
<meta charset="utf-8"></meta>
<title>Homepage</title>
<style>
  body {
            background: #20d8b8;
            color: #999;
            font-size: 100%;
            font-family:  sans-serif;
            margin: 3em;
        }

    #btn{
    	 
       position:absolute;
       top:60%;
       left:51%;
           	color:black;
            padding:15px;
            border-radius:10px;
            background-color:#fff;
    font-size:20px;
   cursor:pointer;
  }
  #btn:hover{
          	background-color:lightblue;}
    	

       

          

        img {
            border-radius: 50%;
            height: 200px;
        }

        .sub {
            bottom: 0px;
            width: 100%;
            position: absolute;
            background: #636363;
            height: 40px;
            text-align: center;
            color: white;
            padding-bottom: 20px;
            font-size:18px; 
            font-weight: 300; 
            
        }

        #name {
            font-size: 20px;
        }

        h2 {
            margin-bottom: 0;
        }

        h3 {
            color: #f6b3a4;
            margin-top: .5em;
            font-weight: normal;
        }

        .flip-container {
            margin: 0 auto;
            -webkit-perspective: 1000;
            -moz-perspective: 1000;
            
            
        }

            .flip-container:hover .flipper {
                -webkit-transform: rotateY(180deg);
                -moz-transform: rotateY(180deg);
            }

        .flipper {
            background: #fff;
            -webkit-transition: 0.6s;
            -webkit-transform-style: preserve-3d;
            -moz-transition: 0.6s;
            -moz-transform-style: preserve-3d;
            position: relative;
        }

        .front, .back {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }

        .front {
            text-align: center;
            padding-top: 30px;
            background: #fff;
            z-index: 1;
        }

        .flip-container, .front, .back {
            width: 20em;
            height: 20em;
        }

        .back {
            background: #636363;
            padding-top: 30px;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
        }

            .back p {
                margin-left: 30px;
                color: white;
                font-weight: 300;
            }
           a{
           	text-decoration:none;
           	color:black;
            padding:15px;
            border-radius:10px;
            background-color:#fff; 
            position:absolute;
            top:60%;
            left:40%;
            
            font-size:20px;          		
           		}
          a:hover{
          	background-color:lightblue;}
          	span{
          		font-size: 20px;
          		color: red;
          		font-weight:bold;
position:absolute;
top:60%;
left:63%;
          		}
       </style>
       <script type="text/javascript">
 function getFile(){
   document.getElementById("photo").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("btn").innerHTML = fileName[fileName.length-1];
    document.getElementById("myform").submit();
    event.preventDefault();
  }
</script>
</head>
<body>




    
    <div class="flip-container">
        <div class="flipper">
            <div class="front">
               <img src=<?php echo "'uploads/".$rollno."/".$rollno.".png'"?> <br>
                <p><h2><?php echo $name?></h2></p>
                <div class="sub">
                    <p><?php echo $dept?> </p>
                </div>
            </div>
            <div class="back">
                <p id="name"><?php echo $name?></p>
                
                <p><?php echo $gender?></p>
                
                <p><?php echo $dept?></p>
            </div>
        </div>
    </div>
    <div id="logout"><p><a href="logout.php">Logout</a></div>
    <div id="btn" onclick="getFile()">Upload Pic</div>
    <span id="error"><?php echo $file_error?></span>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" id="myform" method="post" enctype="multipart/form-data">
   <div style='height: 0px;width: 0px; overflow:hidden;'><input id="photo" type="file" name="photo" onchange="sub(this)"/></div>
    </form>
</body>
</html>
</body>
</html>
