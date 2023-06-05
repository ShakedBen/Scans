<?php
include "database.php";
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>התחברות</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<link rel="stylesheet" href="styles/style.css"/>
  </head>
  <body>
<form action="" method="post">
<div class="login-box">
  <h1>התחברות</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="email" placeholder="שם משתמש" name="email" value="">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="סיסמה" name="password" value="">
  </div>
<table>
  <input type="submit" class="btn" value="התחבר" name="onSubmitLoginButton">
  <a  href="register.php" class="btn" >להרשמה</a>
</table>
  </form>
</div>
  </body>
</html>

