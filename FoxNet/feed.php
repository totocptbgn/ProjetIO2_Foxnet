<?php
session_start();
unset($_SESSION['ErrLog']);
unset($_SESSION['ErrLogS']);

if (!isset($_SESSION['user'])) {
  header('Location: error.php?type=NotConnected'); exit;
}
include_once 'functionFeed.php';
include_once 'connectDB.php';

$user = $_SESSION['user'];

if (isset($_GET['follow'])) {
  if ($_GET['follow'] = "true") {
    $followFeed = true;
  } else {
    $followFeed = false;
  }
} else {
  $followFeed = false;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      <?php if ($followFeed) {
        echo "Follow ";
      } ?>
      Feed - FoxNet</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/feed.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">Welcome  <span style="color:orange"><?php echo getFirstName($_SESSION["user"]).' '; ?></span> !</span>
        <a id="leave" href="disconnect.php">Leave</a>
        <a class="buttonHeader" href="addPost.php">Write a Post</a>
        <a class="buttonHeader" href="profil.php">Profile</a>
    </div>

<div class="feed">
<?php
  if ($followFeed) {
    echo '<a class="feedType" href="feed.php"><span style="color:orange">Follow</span> Feed :</a>';
    $req = "SELECT * FROM `posts`, `subs` WHERE `subscriber` = '$user' AND `author` = `target` ORDER BY `posts`.`ID` DESC;";
  } else {
    echo '<a class="feedType"  href="feed.php?follow=true"><span style="color:orange">Global</span> Feed :</a>';
    $req = "SELECT * FROM `posts` ORDER BY `posts`.`ID` DESC ";
  } //affiche le feed global ou celui de ses amis

$resultat = mysqli_query($connec, $req);
  while ($ligne = mysqli_fetch_assoc($resultat)){
    echo '<div class="post">';
    echo '<div class="titlePost">';
    echo '<span class="author">'.'<a class="authorLogin" href="profil.php?user='.$ligne["author"].'">'.$ligne["author"].'</a>'.' - <span class="fullName">'.getFullName($ligne["author"]).'</span>'.'</span>';
    echo '<span class="date">'.postDate($ligne["date"]).'</span>';
    echo "</div>";
    echo '<div class="content">'.transformePost($ligne["content"]);
    echo '<span class="id">#'.$ligne["ID"].'</span>';
    echo '</div>';
    echo "</div>";
  }//creation des differents posts

mysqli_close($connec);

?>
</div>
</body>
</html>
