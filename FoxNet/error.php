<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ERROR ! - FoxNet</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">There is a <span style="color:orange">problem </span>...</span>
    </div><br>

<br><br><br><br><br><br><br><br><br><br><br><br>


<?php
  $errorDisplayed = false;

  if (isset($_GET['type'])) {

    if ($_GET['type'] == "NotConnected") {
      echo '<div class="annonce">You have to be connected to access this part of the website !</div><br><br>';
      echo '<div class="container"><a id="login" class="button" href="login.php">Log In</a><a id="signup" class="button" href="signup.php">Sign Up</a></div>';
      $errorDisplayed = true;
    }
    if ($_GET['type'] == "AlreadyConnected") {
      echo '<div class="annonce">You are already connected ! Go back where you were... If you want to re-connect or sign-up, please disconnect first !</div><br><br>';
      echo '<div class="container"><a id="signup" class="button" href="disconnect.php">Disconnect</a></div>';
      $errorDisplayed = true;
    }
    if ($_GET['type'] == "forbidden") {
      echo '<div class="annonce">You are not supposed to come here !</div><br><br>';
      echo '<div class="container"><a id="signup" class="button" href="feed.php">Come Back</a></div>';
      $errorDisplayed = true;
    }
    if ($_GET['type'] == "UnknownUser") {
      echo '<div class="annonce">'."This user doesn't exist !</div><br><br>";
      echo '<div class="container"><a id="signup" class="button" href="feed.php">Come Back</a></div>';
      $errorDisplayed = true;
    }
    if ($_GET['type'] == "DeleteNotAllowed") {
      echo '<div class="annonce">You are not allowed to delete post that are not yours !</div><br><br>';
      echo '<div class="container"><a id="signup" class="button" href="feed.php">Come Back</a></div>';
      $errorDisplayed = true;
    }
    if ($errorDisplayed = false) {
      echo '<div class="annonce">'."This error doesn't even exist... You just made an errorception, congrats !"."</div>";
    }

  } else {
    echo '<div class="annonce">'."This error doesn't even exist... You just made an errorception, congrats !"."</div>";
  }
 echo $errorDisplayed;
 // montre les différentes erreur selon le paramètre donné en GET
 ?>



</body>
</html>
