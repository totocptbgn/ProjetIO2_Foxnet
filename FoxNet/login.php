<?php

session_start();
unset($_SESSION["ErrSign"]);
unset($_SESSION["TentLog"]);
unset($_SESSION["TentFN"]);
unset($_SESSION["TentLN"]);
unset($_SESSION["TentBD"]);


if (isset($_SESSION['user'])) {
  header('Location: error.php?type=AlreadyConnected');
} //test si utilisateur déjà connecté


if (!isset($_SESSION["ErrLog"])) {
  $_SESSION["ErrLog"] = 0;
} // initialisation de la variable d'erreur
if (isset($_SESSION["TentLogin"])) {
  $TentLogin = $_SESSION["TentLogin"];
} else {
  $TentLogin = '';
} // mise en variable pour remplissage automatique
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">Please <span style="color:orange">log in</span>.</span>
        <a id="log-in" href="signup.php">Sign Up</a>
    </div><br>
<br>
 <div class="title">
   <img src="img/FoxNet.png" id="logo">
   <img src="img/Banniere.png" id="title">
 </div>
<br><br>

 <div class="error">
 <?php if($_SESSION["ErrLog"] != 0) { echo $_SESSION["ErrLogS"].' ['.$_SESSION["ErrLog"].'] ';}?>
 </div><br>


<div class="container">

  <div></div>

  <div class="container">
  <div></div>
    <form action="connect.php" method="post">
      <span class="vt323">Login : </span><br>
      <input type="text" name="login" size="40" value="<?php echo $TentLogin; ?>" maxlength="30" required autofocus>
      <br><br>
      <span class="vt323">Password : </span><br>
      <input type="password" name="password" size="40" maxlength="50" required>
      <br><br>
      <div class="submit">
        <input class="submit" type="submit" value="Log In">
      </div>


    </form>
  <div></div>
  </div>

  <div></div>

</div>

  </body>
</html>
