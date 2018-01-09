<?php
  include 'views/Account/Subscribe_form.php';

  if(!empty($_POST)){
    include 'models/Model_account.php';
    $form = new Account;
    if($form->check_form_values() == true){
      $form->add_to_bdd();
    }
  }
?>
