<?php

session_start();
  $istrue=false;
  if(isset($_POST["submit"]))  
  { 
     $istrue=true;
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text" >
    <style type="text/css">
    	.header
    	{
    		width: 100%;
    		height: 10%;
    		background-color: lightgrey;
			
			
    	}
		.footer
		{
    		width: 100%;
    		height: 10%;
    		background-color: green;
    		position: absolute;
    		bottom: 0%;
    	}
    </style>
   
</head>
<body>

       

<div class="header">
	<p><h1 align="left" style="color: green;">X  <sub style="color:black">Company </sub></h1></p>
	<h2 align= "right">
		 
		 
		 <a style="color:Blue;" href="Home.php">  Home |  </a> 
		 <a style="color:Blue;" href="Login.php">  Login |  </a>  
		 <a style="color:Blue;" href="Registration.php">  Registration </a> 
   
	
	 </h2><hr>
</div>
<br><br><br><br><br><br><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       
       <center>
       <u><h3> Forget Password  </h3>  </u> <br>
       <b>
       <label>E-mail:</label>
       <input type="text" name = "email" class="form-control" /><br /> <br />  
       <input type="submit" name="submit" value="Submit" /><br />
       </b>
       <?php

if($istrue)
   echo "Check your email <br>";
 ?>
     </form>
     </center>
     <?php

    if($istrue)
       echo "Check your email <br>";
     ?>

<div class="footer">
	<center><h5 style="color: black;">Copyright by F.A.Emon © 2022</h5></center>

</div>
</body>
</html>
