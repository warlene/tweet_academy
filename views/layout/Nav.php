<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tweet Factory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="images/factory.png" height="70" width="70">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(!isset($_SESSION)) { ?>
          <li class="<?php if(empty($_GET)){ ?>active<?php }?>"><a href="rooter.php">Tweet Factory</a></li>
        <li class="<?php if(isset($_GET['action']) && $_GET['action']=='subscribe'){ ?>active<?php } ?>">
            <a href="rooter.php?controller=account&action=subscribe">Inscription</a></li>
        <li class="<?php if(isset($_GET['action']) && $_GET['action']=='connexion'){ ?>active<?php } ?>">
            <a href="rooter.php?controller=account&action=connexion">Connexion</a></li>
        <?php } else { ?>
            <li class="<?php if(empty($_GET)){ ?>active<?php }?>"><a href="rooter.php">Tweet Factory</a></li>
          <li class="<?php if(isset($_GET['action']) && $_GET['action']=='subscribe'){ ?>active<?php } ?>">
            <a href="rooter.php?controller=account&action=subscribe">Accueil</a></li>
        <li class="<?php if(isset($_GET['action']) && $_GET['action']=='connexion'){ ?>active<?php } ?>">
            <a href="rooter.php?controller=account&action=connexion">Notification</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
