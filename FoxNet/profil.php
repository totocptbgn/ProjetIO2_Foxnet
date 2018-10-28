<?php
session_start();

include_once 'connectDB.php';
include_once 'functionFeed.php';

if (!isset($_SESSION['user'])) {
  header('Location: error.php?type=NotConnected'); exit;
}  //test si utilisateur déjà connecté

if (isset($_GET["user"])) {
  $testUser = $_GET["user"];
  $req = "SELECT * FROM userdata WHERE login = '$testUser'";
  $resultat = mysqli_query($connec, $req);
  $ligne = mysqli_fetch_assoc($resultat);
  //test si utilisateur existant
  if (empty($ligne)) {
    header('Location: error.php?type=UnknownUser'); exit;
  }
  $user = $_GET["user"];
  if ($_SESSION["user"] == $user) {
    $ownProfile = true;
  } else {
    $ownProfile = false;
  }
} else {
  $user = $_SESSION["user"];
  $ownProfile = true;
} // Mise en variable du login de la personne du profil et determination si c'est utilisateur
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoxNet - <?php echo $user; ?>'s Profil</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/feed.css">
    <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
    <script src="js/profil.js" charset="utf-8"></script>
  </head>
  <body>

    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">
      <?php
      if ($ownProfile) {
        echo 'Your <span style="color:orange">profile </span> :';
      } else {
        echo "Profile of ";
        echo '<span style="color:orange">'.$user.'</span> :';
      }
      ?></span>
      <a id="leave" href="disconnect.php">Leave</a>
      <a class="buttonHeader" href="addPost.php">Write a Post</a>
      <a class="buttonHeader" href="feed.php">Feed</a>
    </div>
    <div class="profil">


    <?

    if ($ownProfile) {
      $button = "none";
    } else {
      $self = $_SESSION['user'];
      $req = "SELECT * FROM `subs` WHERE subscriber = '$self' AND target = '$user'" ;
      $resultat = mysqli_query ($connec, $req);
      if ($ligne = mysqli_fetch_assoc($resultat)){
          $button = "unfollow";
      } else {
        $button = "follow";
      }
    } //test si déjà suivi et determination du boutton

    $req = "SELECT * FROM userdata WHERE login = '$user'";
    $resultat = mysqli_query($connec, $req);
    $ligne = mysqli_fetch_assoc($resultat);
    $birthDate = $ligne["birthdate"];

    echo '<div class="top">';
    echo '<span class="name">';
    echo '<span style="color:orange">'.$ligne["firstName"]."</span> ".$ligne["lastName"];
    echo "</span>";
    //affichage du nom

    switch ($button) {
      case "none":
        echo "";
        break;
      case "follow":
        echo '<a class="buttonFollow" href="subscribe.php?target='.$user.'">Follow</a>';
        break;
      case "unfollow":
        echo '<a class="buttonUnfollow" href="unsubscribe.php?target='.$user.'">Unfollow</a>';
        break;
    }
    //affichage du boutton


    $nbFollowers = 0;
    $req = " SELECT * FROM `subs` WHERE `target` = '$user' ";
    $resultat = mysqli_query($connec, $req);
      while ($ligne = mysqli_fetch_assoc($resultat)) {
        $nbFollowers++;
      }

    // affichage liste followers
    $nbFollowed = 0;
    $req = " SELECT * FROM `subs` WHERE `subscriber` = '$user' ";
    $resultat = mysqli_query($connec, $req);

      while ($ligne = mysqli_fetch_assoc($resultat)) {
        $nbFollowed++;
      }
    // affichage liste followed



    echo "<br>";
    echo '<span class="follow">';
    ?> <span class="info" onMouseOver="show('subscribers')" onMouseOut="hide('subscribers')">Follow : </span> <?php
    echo $nbFollowed.'.';
    ?> <span class="info" onMouseOver="show('followers')" onMouseOut="hide('followers')"> Followed by : </span> <?php
    echo $nbFollowers.'.';
    //affichage followed+follow
    echo '<span id="followers">';

    $req = " SELECT * FROM `subs` WHERE `target` = '$user' ";
    $resultat = mysqli_query($connec, $req);
    if ($nbFollowers != 0) {
      echo "<br>".'List of <span style="color:orange">Followers</span> :<br>';
      while ($ligne = mysqli_fetch_assoc($resultat)) {
        echo " - ".$ligne['subscriber']."<br>";
      }
    } else {
      echo "Nothing to show !";
    }
    // affichage liste followers
    echo '</span>';
    echo '<span id="subscribers">';

    $req = " SELECT * FROM `subs` WHERE `subscriber` = '$user' ";
    $resultat = mysqli_query($connec, $req);
    if ($nbFollowed != 0) {
      echo '<br>List of <span style="color:orange">Follow</span> :<br>';
      while ($ligne = mysqli_fetch_assoc($resultat)) {
        echo " - ".$ligne['target']."<br>";
      }
    } else {
      echo "Nothing to show !";
    }
    // affichage liste followed

    echo '</span><br>';
    echo '<span class="info">'."Login : </span>".$user;
    echo '<br><span class="info">'."Birthdate : </span>".$birthDate;
    echo "</span><br>";
    echo "</span>";
    echo '</div>';
    //affichage login + date de naissance
    ?>
    </div>
    <div class="feed">
      <div class="feedType">
        <?php

        $req = "SELECT * FROM `posts` WHERE author = '$user' ORDER BY `posts`.`ID` DESC ";
        $resultat = mysqli_query($connec, $req);
        $ligne = mysqli_fetch_assoc($resultat);
        if (empty($ligne)){
          $none = " Nothing to show.";
        } else {
          $none = "";
        }
        //informe qu'il n'y a rien a montrer si il n'y a rien a montrer

        if ($ownProfile) {
          echo 'My <span style="color:orange">posts</span> :';
        } else {
          echo '<span style="color:orange">'.$user.'</span>'."'posts :".$none;
        }

         ?>
      </div>
    <?

    $req = "SELECT * FROM `posts` WHERE author = '$user' ORDER BY `posts`.`ID` DESC ";
    $resultat = mysqli_query($connec, $req);
    while ($ligne = mysqli_fetch_assoc($resultat)){
      echo '<div class="post">';
      echo '<div class="titlePost">';
      echo '<span class="author">'.'<a class="authorLogin" href="profil.php?user='.$ligne["author"].'">'.$ligne["author"].'</a>'.' - <span class="fullName">'.getFullName($ligne["author"]).'</span>'.'</span>';
      echo '<span class="date">'.postDate($ligne["date"]).'</span>';
      echo "</div>";
      echo '<div class="content">'.transformePost($ligne["content"]);
      echo '<span class="id">';
      if ($ownProfile) {echo '<a class="delete" href="deletePost.php?id='.$ligne["ID"].'"></a>';}
      echo '#'.$ligne["ID"].'</span>';
      echo '</div>';
      echo "</div>";
    }
     //affichage des posts du profil
      if ($ownProfile) {echo '<a class="endAccount" href="deleteAccount.php"></a>';}
      //bouton supression compte
    mysqli_close($connec);
    ?>


</body>
</html>
