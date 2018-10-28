<?php
  session_start();
  unset($_SESSION["ErrLog"]);
  unset($_SESSION['ErrLogS']);
  unset($_SESSION["TentLogin"]);

  if (isset($_SESSION['user'])) {
    header('Location: error.php?type=AlreadyConnected');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up - FoxNet</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">Please <span style="color:orange">sign up</span>.</span>
        <a id="log-in" href="login.php">Log In</a>
    </div>

 <div class="title">
   <img src="img/FoxNet.png" id="logo">
   <img src="img/Banniere.png" id="title">
 </div>
<br><br><br>
<div class="error">
<?php
  if(isset($_SESSION["ErrSign"])) {
    echo $_SESSION["ErrSign"];
  }
  // affichage de l'erreur d'inscription

  if (isset($_SESSION["TentLog"])) {
     $username = $_SESSION["TentLog"];
     $firstname = $_SESSION["TentFN"];
     $lastname = $_SESSION["TentLN"];
     $birthdate = $_SESSION["TentBD"];
  } else {
    $username = "";
    $firstname = "";
    $lastname = "";
    $birthdate = "";
  }
  // mise en variable de session pour remplissage du formulaire automatique
?>
</div><br>
<div class="container">
  <div></div>
  <div class="container">
  <div></div>
    <form action="save.php" method="post">
      <span class="vt323">First Name : </span><br>
      <input type="text" name="firstName" size="35" value="<?php echo $firstname; ?>" maxlength="30" required>
      <br><br><span class="vt323">Last Name : </span><br>
      <input type="text" name="lastName" size="35" value="<?php echo $lastname; ?>" maxlength="30" required>
      <br><br><span class="vt323">Birth Date : </span><br>
      <input type="date" name="birth" size="35" value="<?php echo $birthdate; ?>" maxlength="50" required>
      <br><br><span class="vt323">Login : </span><br>
      <input type="text" name="login" size="35" value="<?php echo $username; ?>" maxlength="30" required>
      <br><br>
      <span class="vt323">Password : </span><br>
      <input type="password" name="password" size="35" required> <br><br>
      <input type="password" name="passwordCheck" placeholder="Please enter your password again." size="35">
      <br><br>
      <br><br>
      <div class="submit">
        <input class="submit" type="submit" value="Sign Up">
      </div><br><br><br>
  </form>
  <div></div>
  </div>

  <div></div>

</div>

  </body>
</html>
