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
<br><br><br><br><br>
<?php
	
   $usernameErr = $passwordErr = "" ;
   $username = $password = ""  ; 
   $isuserok=false;
   $ispassok=false;

 if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {
       if (empty($_POST["username"])) 
       {
          $usernameErr = "UserName is required!";
       } 
     
       else 
       {
          $username = test_input($_POST["username"]);
   
 
            if(empty($usernameErr))
            {
               $data = file_get_contents("Data.json");  
               $data = json_decode($data, true);  
               foreach($data as $row)  
               {   
                 if($row["username"]==$username)
                 {
                     $isuserok=true;
                     break;
                 } 
                     
               }  
            }
       }
       


       if(empty($_POST["password"])) 
       {
           $passwordErr = "Password is required!";
       } 
       else 
           {    
              $password = test_input($_POST["password"]);
              

               if(empty($passwordErr))
               {
                  $data = file_get_contents("Data.json");  
                  $data = json_decode($data, true);  
                  foreach($data as $row)  
                  {   
                    if($row["Pass"]==$password)
                    {
                        $ispassok=true;
                        break;
                    } 
                        
                  }  
               }
           }
     
     if(!empty($_POST["Remember me"]))
     {
       if(empty($passwordErr) && empty($usernameErr))
       {

        
     $cookie_user = $username;
      $cookie_pass = $password;
      setcookie($cookie_user, $cookie_pass, time() + (86400 * 7), "/"); 

       }
     }

       
   }


   function test_input($data) 
   {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }
?>
      <br>
      
 

      <h1> LOGIN </h1> 
     
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
     
     
         UserName : 
          <input type="text" name="username" value="<?php echo $username;?>">
          <span class="error"> * <?php echo $usernameErr; ?> </span>
          <br><br>
         
        Password :
           <input type="password" name="password" value="<?php echo $password;?>">
           <span class="error"> * <?php echo $passwordErr;?></span>
           <br><br>
           
        <div>
           
           <input type="checkbox" name="Remember me"> Remember Me <br><br>

           <input type="submit" name="submit" value="Submit"   > 
        
           <a style="color:Blu;" href="Forgetpass.php">Forgot Password?</a><br>
           
          
          

        
               
        </div>
    
    </form> <br>
      <?php
       if($ispassok==true && $isuserok==true)
       {
           echo "Login Succsessful <br>";
            
           $data = file_get_contents("Data.json");  
               $data = json_decode($data, true);  
               foreach($data as $row)  
               {   
                 if($row["username"]==$username)
                 {
                  
                   $_SESSION["Pass"]=$row["Pass"];
                   $_SESSION["name"]=$row["name"];
                   $_SESSION["email"]=$row["e-mail"];
                   $_SESSION["gender"]=$row["gender"];
                   $_SESSION["dob"]=$row["dob"];
                     break;
                 } 
                     
               }

       }
       else
       {
           $usernameErr= "Incorrect username" ;
           $passwordErr=" Incoorrect Password" ;
       }

      ?>
     
     </div>






      <div class="footer">
	   <center><h5 style="color: black;">Copyright by F.A.Emon © 2022</h5></center>

</div>
</body>
</html>
