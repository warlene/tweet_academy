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
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li class="<?php if(isset($_GET['action']) && $_GET['action']=='login'){ ?>active<?php } ?>">
            <a href="rooter.php">Accueil</a></li>
          <li class="<?php if(isset($_GET['action']) && $_GET['action']=='note'){ ?>active<?php } ?>">
            <a href="rooter.php?controller=account&action=note">Notifications</a></li>
            <li class="<?php if(isset($_GET['action']) && $_GET['action']=='message'){ ?>active<?php } ?>">
              <a href="rooter.php?controller=account&action=message">Messages</a></li>
            <li><img src="images/factory.png" height="70" width="70"></li>

        <form class="navbar-form navbar-right" role="search">
          <div class="form-group input-group">
            <input type="text" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
            <li class="<?php if(isset($_GET['action']) && $_GET['action']=='logout'){ ?>active<?php } ?>">
            <a href="rooter.php?controller=account&action=logout">Deconnexion</a></li>
          </div>
        </form>
      </ul>
    </div>
  </div>
</nav>
