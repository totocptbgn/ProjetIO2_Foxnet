<?php
 session_start();
 unset($_SESSION["ErrLog"]);
 unset($_SESSION['ErrLogS']);
 unset($_SESSION["TentLogin"]);
 ?>

<!DOCTYPE html>

<!-- Inspiré de : https://codepen.io/ge1doot/pen/LkdOwj

                  ,--.    ,--.
                 ((O ))--((O ))
               ,'_`--'____`--'_`.
              _:  ____________  :_
             | | ||::::::::::|| | |
             | | ||::::::::::|| | |
             | | ||::::::::::|| | |
             |_| |/__________\| |_|
               |________________|
            __..-'            `-..__
         .-| : .----------------. : |-.
       ,\ || | |\______________/| | || /.
      /`.\:| | ||  __  __  __  || | |;/,'\
     :`-._\;.| || '--''--''--' || |,:/_.-':
     |    :  | || .----------. || |  :    |
     |    |  | || '----SSt---' || |  |    |
     |    |  | ||   _   _   _  || |  |    |
     :,--.;  | ||  (_) (_) (_) || |  :,--.;
     (`-'|)  | ||______________|| |  (|`-')
      `--'   | |/______________\| |   `--'
             |____________________|
              `.________________,'
               (_______)(_______)
               (_______)(_______)
               (_______)(_______)
               (_______)(_______)
              |        ||        |
              '--------''--------'
-->

<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Robot Room - FoxNet</title>
  <script>
  if (window.location.href.indexOf("fullcpgrid") > -1) {
  	document.addEventListener('DOMContentLoaded', function() {
  		const original = document.createElement('iframe');
  		original.style.display = 'none';
  		document.body.appendChild(original);
  		window.requestAnimationFrame = original.contentWindow.requestAnimationFrame;
  	}, false);
  }
  </script>
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/signup.css">
  <link rel="icon" type="image/x-icon" href="img/FoxNet.ico">
  <style media="screen">
  body, html {
    position: absolute;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
  canvas {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 1));
    cursor: pointer;
  }
  </style>
</head>
<body>
    <div class="header">
        <img src="img/BannerFullGrey.png" class="header">
        <span id="headerTitle">What is going on <span style="color:orange">here </span>!? Omg... You are not supposed to see this.</span>
        <a id="log-in" href="login.php">Log In</a>
    </div>
    <canvas></canvas>
    <script src="js/robots.js" charset="utf-8"></script>
</html>
