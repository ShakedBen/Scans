<?php

if(isset($_POST["u_btn"]))
{
    $name=$_POST["name"];
    $lastName=$_POST["lastName"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    
     $selectfdb=mysqli_query($conn,"SELECT * FROM users WHERE u_email='$u_email'" );
     $row=mysqli_fetch_array($selectfdb);
      if($row["u_email"]==$u_email)
      {
    echo "<h1><strong>The email is busy try one another</strong></h1>";
      }
      
      
     else if(empty($u_cpassword)||empty($u_password))
         {
             echo "Invalid password";
         }
     
     else if($u_password!=$u_cpassword)
     {
         echo "Password confirmation is invalid";
     }
      else if (strlen($u_password) < 8) 
          {
       echo  "Password too short!";
    }

    else if (!preg_match("#[0-9]+#", $u_password)) 
            {
         echo "Password must include at least one number!";
    }

    else if (!preg_match("#[a-zA-Z]+#", $u_password)) 
            {
         echo  "Password must include at least one letter!";
    }     
     else if(strlen($u_name)==0)
     {
        echo "invalid name";
     }
        else if(strlen($u_lname)==0)
     {
        echo "invalid last name";
     }
     else if(!preg_match("/^[a-zA-Z]/i", $u_name))
     {
         echo "<strong>invalid  name.</strong>";
         
         
     }
      else if(!preg_match("/^[a-zA-Z]/i", $u_lname))
     {
           echo "invalid last name";
         
     }
   else if(empty($u_name)||empty($u_lname)||empty($u_email)||empty($u_password))
    {
        echo "please.. complete all data";
    }
    else{
    $insert= mysqli_query($conn, "INSERT INTO `users` (`u_name`, `u_lname`,  `u_email`, `u_password`,) VALUES ('$u_name', '$u_lname', '$u_email', '$u_password', )");
     echo "<meta http-equiv='refresh' content='0; registerSuccee.php'>";
    }

}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>הרשמה</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <title>הרשמה</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body>


<form name="reg" action="register.php" method="post" onsubmit="return Check_password(),Check_UserName(),Check_LastName()">
    
    
    
    
    <div class="login-box">
     <h1>הרשמה</h1>
       <div class="textbox">
    <i class="fas fa-user"></i>
<input type="text" name="u_name"  value="" placeholder="שם" required/>
</div>
	<div class="textbox">
    <input type="text" name="u_lname" placeholder="שם משפחה"  value="" required/>
        </div>
	<div class="textbox">
	<input type="email" name="u_email" value="" placeholder="אימייל" required/>
        </div>  
     
    <div class="textbox">
    <i class="fas fa-lock"></i>
	<td><input type="password" name="u_password" placeholder="סיסמה" value="" required/>
	</div>
    <div class="textbox">
    <i class="fas fa-lock"></i>
<input type="password" name="u_cpassword" placeholder="אימות סיסמה" value="" required/>
    </div>
    <table>
     <th>
        <tr><input type="submit" class="btn" name="u_btn" value="הירשם"></tr>
</th>
     <th>
        <tr><a href="index.php" class="btn" >התחברות</a></tr>
</th>
</table>    
</form>
     </body>
</html>