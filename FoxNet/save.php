<?php
  session_start();
  unset($_SESSION["ErrSign"]);
  unset($_SESSION["TentLog"]);
  unset($_SESSION["TentFN"]);
  unset($_SESSION["TentLN"]);
  unset($_SESSION["TentBD"]);
  // variable de session

  include_once 'connectDB.php';

  if (isset($_SESSION['user'])) {
    header('Location: error.php?type=AlreadyConnected');
  } // test si utilisateur déjà connecté

  $username = strtolower(htmlspecialchars(trim(mysqli_real_escape_string($connec,$_POST['login']))));
  $psw = mysqli_real_escape_string($connec,htmlspecialchars($_POST['password']));
  $psw = password_hash($psw, PASSWORD_DEFAULT);
  $firstname = mysqli_real_escape_string($connec,htmlspecialchars(trim($_POST['firstName'])));
  $lastname = mysqli_real_escape_string($connec,htmlspecialchars(trim($_POST['lastName'])));
  $birthdate = mysqli_real_escape_string($connec,htmlspecialchars(trim($_POST['birth'])));
  // variable d'enregistrement

  $_SESSION["TentLog"] = $username;
  $_SESSION["TentFN"] = $firstname;
  $_SESSION["TentLN"] = $lastname;
  $_SESSION["TentBD"] = $birthdate;
  // mise en variable de session pour remplissage du formulaire automatique


  $req = "SELECT login FROM userdata WHERE login = '$username';";
  $resultat = mysqli_query ($connec, $req);
  if ($ligne = mysqli_fetch_assoc($resultat)){
      $_SESSION["ErrSign"] = "This username is already taken !";
      header('Location: signup.php'); exit;
  }
  // test username déja utlisé

  if ($_POST["passwordCheck"] != $_POST["password"]){
      $_SESSION["ErrSign"] = "Please enter the same password 2 times !";
      header('Location: signup.php'); exit;
  }
  // test mots de passe identiques

  $req = "INSERT INTO `userdata` (`login`, `password`, `firstName`, `lastName`, `birthdate`) VALUES ('$username', '$psw', '$firstname', '$lastname', '$birthdate');";
  mysqli_query($connec, $req);
  // inscription dans la DB

  $_SESSION['user'] = $username;


  $req = "INSERT INTO `subs` (`subscriber`, `target`) VALUES ('$username', 'totocptbgn');";
  mysqli_query($connec, $req);
  // suivie automatique de la personne qui a écrit cette ligne :p (compte : totocptbgn)

  header('Location: profil.php'); exit;
  //redirecttion vers son nouveau profil
  ?>
