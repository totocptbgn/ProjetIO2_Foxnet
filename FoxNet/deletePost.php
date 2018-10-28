<?php

session_start();
include_once 'connectDB.php';

if (!isset($_SESSION['user'])) {
  header('Location: error.php?type=NotConnected'); exit;
}

$idPost = $_GET['id'];
$req = "SELECT * FROM `posts` WHERE `ID` = '$idPost';";
$resultat = mysqli_query($connec, $req);
$ligne = mysqli_fetch_assoc($resultat);

if ($_SESSION['user'] != $ligne['author']) {
  header('Location: error.php?type=DeleteNotAllowed'); exit;
} // determination si c'est l'auteur qui supprime son propre post, sinon redirection

$req = "DELETE FROM `posts` WHERE `ID` = $idPost;";
mysqli_query($connec, $req);
//suppression du post de la base de donnée

mysqli_close($connec);
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
