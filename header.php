<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Livre D'Or</title>
</head>
<body>
  
  <header>
  <div class="container">
    <h1>
      <a href="#menu">MENU</a>
    </h1>

    <div class="popover" id="menu">
      <div class='content'>
        <a href="#" class="close"></a>
        <div class='nav'>
          <ul class='nav_list'>
            
                <?php
                
                if (!empty($_SESSION["login"])) {
                    echo "<div class='nav_list_item'><li><a href='index.php'>Home</a></li></div>";
                    echo "<div class='nav_list_item'><li><a href='profil.php'>Profil</a></li></div>";
                    echo "<div class='nav_list_item'><li><a href='guestbook.php'>Livre d'Or</a></li></div>";
                    echo "<div class='nav_list_item'><li><a href='deconnexion.php'>Déconnexion</a></li></div>";
                } else {
                    echo "<div class='nav_list_item'><li><a href='index.php'>Home</a></li></div>";
                    echo "<div class='nav_list_item'><li><a href='Inscription.php'>Inscription</a></li></div>";
                    echo "<div class='nav_list_item'><li><a href='connexion.php'>Connexion</a></li></div>";
                }
                ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

</header>