<?php

session_start();
if (!isset($_SESSION['user'])) {
  header('Location: error.php?type=NotConnected'); exit;
}

unset($_SESSION);
session_destroy();
header('Location: bye.php');
// déconnection

?>
