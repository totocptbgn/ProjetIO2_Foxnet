<?php
session_start();
include_once 'connectDB.php';

if (!isset($_SESSION['user'])) {
  header('Location: error.php?type=NotConnected'); exit;
}

if (!isset($_GET['target'])){
  header('Location: '.$_SERVER['HTTP_REFERER']);
}// test si le lien est bien rentré (qu'il y a une cible)

$target = $_GET['target'];
// recuperation de la personne suivie

$following = $_SESSION['user'];
// recuperation de la personne qui suit

$req = "SELECT * FROM `subs` WHERE subscriber = '$following' AND target = '$target'" ;
$resultat = mysqli_query ($connec, $req);
if ($ligne = mysqli_fetch_assoc($resultat)){
    header('Location: '.$_SERVER['HTTP_REFERER']); exit;
}
// test subs déja existante

$req = "INSERT INTO `subs` (`subscriber`, `target`) VALUES ('$following', '$target');";
mysqli_query($connec, $req);
// inscription dans la DB  subs

mysqli_close($connec);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
