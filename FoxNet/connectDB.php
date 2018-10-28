<?php
$serv = "localhost";
$login = "root";
$password = "root";
$db = "foxnet";

$connec = mysqli_connect ($serv,$login,$password,$db);
if (!$connec) {
echo "Connection failed...<br>" ; exit;
}
mysqli_set_charset($connec, "utf8");
//connection à la base de donnée
?>
