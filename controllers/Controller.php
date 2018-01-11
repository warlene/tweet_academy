<?php
  if(empty($_SESSION)){
    include 'views/layout/Homepage.php';
  }
  if(isset($_SESSION['idUser'])){
    include 'views/layout/News_homepage.php';
  }
?>
