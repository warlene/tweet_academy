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
  <script src="js/tweet_academie.js"></script>
  <!-- <meta http-equiv="refresh" content="5"> -->
  <!-- <script src="js/tweet_academie.js" type="text/javascript"></script> -->
</head>
<body>

<nav class="navbar navbar-inverse navbar-primary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse col-md-6" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><img src="images/factory.png" height="70" width="70"></li>
        <li class="<?php if(!isset($_GET['action'])){ ?>active<?php } ?>">
          <a href="rooter.php">Accueil</a></li>
        <li class="<?php if(isset($_GET['action']) && $_GET['action']=='note'){ ?>active<?php } ?>">
          <a href="rooter.php?controller=account&action=note">Notifications</a></li>
        <li class="<?php if(isset($_GET['action']) && $_GET['action']=='message'){ ?>active<?php } ?>">
          <a href="rooter.php?controller=account&action=message">Messages</a></li>
      </ul>
    </div>
      <form method="post" action="" class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input  type="text" name="search_tag" class="form-control" placeholder="Recherche de #">
          <span class="input-group-btn">
            <button name="confirm_tag" class="btn btn-default" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown <?php if(isset($_GET['action']) && $_GET['action']=='profil'){ ?>active<?php } ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="rooter.php?controller=user&action=profil"><?php echo $_SESSION['fullName'] ?></a></li>
          <li><a class="dropdown-item" href="rooter.php?controller=user&action=profil"><?php echo $_SESSION['displayName'] ?></a></li>
          <li role="separator" class="divider"></li>
          <li><a class="dropdown-item" href="rooter.php?controller=user&action=profil">Profil</a></li>
          <li><a class="dropdown-item" href="views/User/User_Profil.php">Paramètres</a></li>
          <li><a class="dropdown-item" href="rooter.php?controller=account&action=logout">Déconnexion</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
