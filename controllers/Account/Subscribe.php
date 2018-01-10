<?php
  if(!empty($_POST)){
    include 'models/Model_account.php';
    $form = new Account;
    $check_value = $form->check_form_values();
    if($check_value == true){
      include 'models/Model.php';
      $fullname = Model::clean_data($_POST['fullname']);
      $displayname = Model::clean_displayname($_POST['displayname']);
      $mail = $_POST['mail'];
      $password = $form->hash_password($_POST['password']);
      $addBdd = $form->add_to_bdd($fullname, $displayname, $mail, $password);
      if(!is_int(intval($addBdd)){
        e
      }
      include 'views/Account/Subscribe_ok.php';
    }
    if($check_value == false){
      include 'views/Account/Subscribe_form.php';
    }
  }
  else{
    include 'views/Account/Subscribe_form.php';
  }
?>
