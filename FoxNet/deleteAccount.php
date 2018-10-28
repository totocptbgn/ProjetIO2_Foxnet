<?php

session_start();
include_once 'connectDB.php';

if (!isset($_SESSION['user'])) {
  header('Location: error.php?type=NotConnected'); exit;
}

$user = $_SESSION['user'];
$req = "DELETE FROM `userdata` WHERE login = '$user';";
$resultat = mysqli_query($connec, $req);

$req = "DELETE FROM `posts` WHERE author = '$user';";
mysqli_query($connec, $req);
//suppression des posts de la base de donnée

$req = "DELETE FROM `subs` WHERE subscriber = '$user' OR target = '$user';";
mysqli_query($connec, $req);
//suppression des subs avec le compte correspondant

include 'disconnect.php';
mysqli_close($connec);
header('Location: accountDeleted.php');


?>
