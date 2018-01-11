<?php
  session_start();

   $_controller = isset($_GET['controller'])? $_GET['controller'] : '';
   $_action = isset($_GET['action']) ? $_GET['action'] : 'index';
   $controller_name = ucfirst($_controller) . 'Controller';
   $pathController = 'controllers/' . $controller_name . '.php';
   require_once $pathController;

   if(class_exists($controller_name)) {
     $controller = new $controller_name();
     if(method_exists($controller, $_action)) {
       $controller->$_action();
     }
     else{
       die ("Method $_action not found in $controller_name.");
     }

   }
   else {
     die("Class $controller_name not found.");
   }
?>
