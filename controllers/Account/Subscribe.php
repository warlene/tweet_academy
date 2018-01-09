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
      $form->add_to_bdd($fullname, $displayname, $mail, $password);

      include 'views/Account/Subscribe_ok.php';
    }
    if(is_array($check_value)){
      foreach ($check_value as $value) {
        echo '<p>' . $value . '</p>';
      }
      include 'views/Account/Subscribe_form.php';
    }
  }
  else{
    include 'views/Account/Subscribe_form.php';
  }
?>
