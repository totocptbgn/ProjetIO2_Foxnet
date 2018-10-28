<?php

session_start();
unset($_SESSION["ErrLog"]);
unset($_SESSION['ErrLogS']);
unset($_SESSION["TentLogin"]);
//detruits les parametres pour le Login
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to FoxNet</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">Welcome to <span style="color:orange">FoxNet</span> !</span>
    </div><br>

 <div class="title">
   <img src="img/FoxNet.png" id="logo">
   <img src="img/Banniere.png" id="title">
 </div>
<br><br><br>

<div class="container">
    <a id="login" class="button" href="login.php">Log In</a>
    <a id="signup" class="button" href="signup.php">Sign Up</a>
</div>

<div id="mail">
  <a id="mail" href="mailto:lowx.add@gmail.com">by Thomas Copt-Bignon</a>
</div>


  </body>
</html>
