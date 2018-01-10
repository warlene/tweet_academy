<?php
if(!empty($_POST)){
  include 'models/Model_account.php';
  include 'models/Model.php';
  $form = new Account;
  $password = $form->hash_password($_POST['password']);
  $check = $form->user_exists($_POST['identity'], $password);
  if($check == null){
    echo '<p>La connexion a échoué. Veuillez vérifier vos données et réessayer.</p>';
    include 'views/Account/Connexion_form.php';
  }
  if(is_int(intval($check))){
    $user_infos = $form->read_user_info($check);
    if($user_infos == false){
      echo '<p>Erreur lors de la connexion. Essayez plus tard.</p>';
      include 'views/Account/Connexion_form.php';
    }
    else{
      $_SESSION['idUser'] = $check;
  	  $_SESSION['fullName'] = $user_infos['fullName'];
  	  $_SESSION['displayName'] = $user_infos['displayName'];
  	  $_SESSION['mail']  = $user_infos['mail'];
      $_SESSION['idUrlAvatar']  = $user_infos['idUrlAvatar'];
      $_SESSION['theme']  = $user_infos['theme'];
      $_SESSION['userStatus'] = $user_infos['userStatus'];
      include 'views/Account/Connexion_ok.php';
    }
  }
}
else{
  include 'views/Account/Connexion_form.php';
}
?>
