<?php
include 'database.php';
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
<form name="reg" method="post" >
    
    
    
    
    <div class="login-box">
     <h1>הרשמה</h1>
       <div class="textbox">
    <i class="fas fa-user"></i>
<input type="text" name="name"  value="" placeholder="שם" required/>
</div>
	<div class="textbox">
    <input type="text" name="lastName" placeholder="שם משפחה"  value="" required/>
        </div>
	<div class="textbox">
	<input type="email" name="email" value="" placeholder="אימייל" required/>
        </div>  
     
    <div class="textbox">
    <i class="fas fa-lock"></i>
	<td><input type="password" name="password" placeholder="סיסמה" value="" required/>
	</div>
    <div class="textbox">
    <i class="fas fa-lock"></i>
<input type="password" name="cpassword" placeholder="אימות סיסמה" value="" required/>
    </div>
    <table>
     <th>
        <tr><input type="submit" class="btn" name="onSubmitRegisterButton" value="הירשם"></tr>
        </th>
     <th>
        <tr><a href="index.php" class="btn" >התחברות</a></tr>
</th>
</table>    
</form>
     </body>
</html>