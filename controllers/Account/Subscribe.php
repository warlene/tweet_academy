<?php
  include 'views/Account/Subscribe_form.php';

  if(isset($_POST)){
    include 'models/Model_account.php';
    $form = new Account;
    $form->check_form_values();
  }
?>
