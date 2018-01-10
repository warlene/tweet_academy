<?php
  session_start();
  include 'views/layout/Nav.php';

  $controller = isset($_GET['controller'])? dirname(__FILE__).'/controllers/' . $_GET["controller"] : dirname(__FILE__).'/controllers/';
  $action = isset($_GET['action'])? $_GET['action'] : 'Controller';
  $controller_name = ucfirst($controller). '/' . ucfirst($action) . '.php';

  include $controller_name;
?>
