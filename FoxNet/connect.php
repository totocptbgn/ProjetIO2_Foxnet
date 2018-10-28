<?php

session_start();
include_once 'connectDB.php';

$username = strtolower(htmlspecialchars($_POST["login"]));
$psw = mysqli_real_escape_string($connec,htmlspecialchars($_POST["password"]));

// Easter Egg :p
  if ($username == "robot room" && $psw == " ") {
    $_SESSION["ErrLog"]++;
    $_SESSION["TentLogin"] = $_POST["login"];
    $_SESSION["ErrLogS"] = "yeeet";
    header('Location: RobotRoom.php'); exit;
  }
//

$req = "SELECT * FROM userdata WHERE login = '$username'";
$resultat = mysqli_query($connec, $req);
$ligne = mysqli_fetch_assoc($resultat);

if (empty($ligne)) {
  $_SESSION["ErrLog"]++;
  $_SESSION["TentLogin"] = $_POST["login"];
  $_SESSION["ErrLogS"] = "Username unknown";
  mysqli_close($connec);
  header('Location: login.php'); exit;
} // test si l'username existe

if (password_verify($psw, $ligne['password'])) {
  $_SESSION["user"] = $_POST["login"];
  unset($_SESSION["ErrLog"]);
  unset($_SESSION["TentLogin"]);
  mysqli_close($connec);
  header('Location: feed.php'); exit;
} else {
  $_SESSION["ErrLog"]++;
  $_SESSION["TentLogin"] = $_POST["login"];
  $_SESSION["ErrLogS"] = "Wrong password";
  mysqli_close($connec);
  header('Location: login.php'); exit;
} // test si le mot de passe est bon, puis redirection

?>
