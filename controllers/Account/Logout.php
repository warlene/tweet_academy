<?php
  include 'models/Model_account.php';
  $session = new Account;
  $session->logout();
  include 'views/Account/Logout.php';
?>
