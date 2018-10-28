<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: error.php?type=NotConnected'); exit;
  }
  include_once 'connectDB.php';

  $post = mysqli_real_escape_string($connec,htmlspecialchars(trim($_POST['textPost'])));
  // variable d'enregistrement

  date_default_timezone_set("Europe/Paris");
  $currentDate = date("Y-m-d-H-i");
  // récuperation de la date actuelle

  $author = $_SESSION["user"];
  // récuperation du username de l'utilisateur

  $req = "SELECT * FROM `postcounter`";
  $resultat = mysqli_query($connec, $req);
  $ligne = mysqli_fetch_assoc($resultat);
  $idDB = $ligne["LastID"];
  $lastID = $idDB;
  $idDB++;
  // récuperation du dernier ID

  $req = "INSERT INTO `posts` (`ID`, `author`, `date`, `content`) VALUES ('$idDB', '$author', '$currentDate', '$post');";
  mysqli_query($connec, $req);
  // inscription dans la DB

  $req = "UPDATE `postcounter` SET `LastID` = '$idDB' WHERE `postcounter`.`LastID` = $lastID;";
  mysqli_query($connec, $req);
  // mise à jour du compteur de post

  mysqli_close($connec);
  header('Location: feed.php');
  ?>
