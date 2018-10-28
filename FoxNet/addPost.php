<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header('Location: error.php?type=NotConnected'); exit;
  }
  include_once 'functionFeed.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Write a new Post - FoxNet</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/addPost.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">Say what's on your mind <span style="color:orange"><?php echo getFirstName($_SESSION["user"]).' '; ?></span>!</span>
        <a id="leave" href="disconnect.php">Leave</a>
        <a class="buttonHeader" href="profil.php">Profile</a>
        <a class="buttonHeader" href="feed.php">Feed</a>
    </div>
<br><br><br><br>
<div class="container">
  <div></div>
  <div class="container">
  <div></div>
    <form action="newPost.php" method="post">
      <span class="vt323">Write a post : </span><br>
      <textarea name="textPost" rows="5" cols="50" maxlength="300" required></textarea>
      <div class="submit">
        <input class="submit" type="submit" value="Post">
      </div><br><br><br>
  </form>
  <div></div>
  </div>
  <div></div>
</div>

  </body>
</html>
