<?php
function getFullName($username){
  include 'connectDB.php';
  $req = "SELECT * FROM userdata WHERE login = '$username'";
  $resultat = mysqli_query($connec, $req);
  $ligne = mysqli_fetch_assoc($resultat);
  return $ligne["firstName"]." ".$ligne["lastName"];
} // recuperation du nom complet

function getFirstName($username){
  include 'connectDB.php';
  $req = "SELECT * FROM userdata WHERE login = '$username'";
  $resultat = mysqli_query($connec, $req);
  $ligne = mysqli_fetch_assoc($resultat);
  return $ligne["firstName"];
} // recuperation du prenom

function pluriel($value){
  if ($value == 1 || $value == 0) {
    return "";
  } return "s";
} // fonction pour savoir si il faut mettre au pluriel

function postDate($date){
  $year = substr($date, 0, 4);
  $month = substr($date, 5, 2);
  $day = substr($date, 8, 2);
  $hour = substr($date, 11, 2);
  $minute = substr($date, 14, 2);
  // découpage de la date

  date_default_timezone_set("Europe/Paris");
  $currentDate = date("Y-m-d-H-i");
  // récuperation de la date actuelle

  $currentYear = substr($currentDate, 0, 4);
  $currentMonth = substr($currentDate, 5, 2);
  $currentDay = substr($currentDate, 8, 2);
  $currentHour = substr($currentDate, 11, 2);
  $currentMinute = substr($currentDate, 14, 2);
  // découpage de la date actuelle

  $year = abs($currentYear - $year);
  $month = abs($currentMonth - $month);
  $day = abs($currentDay - $day);
  $hour = abs($currentHour - $hour);
  $minute = abs($currentMinute - $minute);
  //traitement de la date

  if ($year == 0) {
    if ($month == 0) {
      if ($day == 0) {
        if ($hour == 0) {
          return $minute." minute".pluriel($minute)." ago";
        } else {
          return $hour." hour".pluriel($hour)." ago";
          }
      } else {
        return $day." day".pluriel($day)." ago";
        }
    } else {
      return $month." month".pluriel($month)." ago";
      }
  } else {
    return $year." year".pluriel($year)." ago";
    }
  // mise en chaine de caractère puis return
}

function transformePost($message){
  $firstChar = substr($message, 0, 1);
  $lastChar = substr($message,-1, 1);

  if ($lastChar == '*' && $firstChar == '*') {
    $message = substr($message,1, -1);
    return  '<span style="font-weight:bold" class="content">'.$message.'</span>';
  }
  return  '<span class="content">'.$message.'</span>';
} // mets en gras les messages encadrés par des *

?>
