<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
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
   
	
	 </h2> 
</div>



<?php  
 $message = '';  
 $error = '';
  $isok=false;
  $istrue=false;
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else  if(!preg_match("/^[a-zA-Z-_ ]*$/",$_POST["un"])) 
      {
     $error = " User Name can contain alpha numeric characters, period, dash or underscore only!";
    }

      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(!preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $_POST["pass"])) 
          {
        $error= "Password must contain at least 1 special char!"."<br>";
     }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
     
           if(file_exists('Data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
               
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],
                     'Pass'            =>     $_POST['pass'],
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                
                if(file_put_contents('Data.json', $final_data) && $istrue)  
                {  
                     $isok=true;  
                }
                else
                {
                     $isok=false;
                    
                } 
                
           }  
           else  
           {  
                $isok=false;  
           }
           
           if($istrue && $isok)
           {
             $message="Registration Complete"; 
           }
          
} 
      
    
     
     
 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Registration</title>  
          
      <body>  
           <br />  


   
           <div class="container" style="width:500px;">  
                <h2 align="center"> <b>Registration</b></h2><br />                 
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"> 
                <center>
                     <br />  
                     <label>Name:</label>  
                     <input type="text" name="name" class="form-control" /><br />  <br />  
                     <label>E-mail:</label>
                     <input type="text" name = "email" class="form-control" /><br /> <br />  
                     <label>User Name:</label>
                     <input type="text" name = "un" class="form-control" /><br /> <br />  
                     <label>Password:</label>
                     <input type="password" name = "pass" class="form-control" /><br /><br />  
                     <label>Confirm Password:</label>
                     <input type="password" name = "Cpass" class="form-control" /><br /><br />  

                   
                    Gender:
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><br><br />  

                    Date of Birth:
                     <input type="date" name="dob"> <br><br>  <br> 

                     <input type="submit" name="submit" value="Submit" /><br /> 

                     </center>
     
                </form> 
                
                    <?php  
                        if($istrue && $isok)  
                        {  
                           echo $message;  
                        } 
                        else
                           echo $error; 
                     ?>
           </div>  
           <br />  
      </body>  
 </html>  



<div class="footer">
	<center><h5 style="color: black;">Copyright by F.A.Emon © 2022</h5></center>

</div>
</body>
</html>
