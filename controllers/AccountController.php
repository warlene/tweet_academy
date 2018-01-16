<?php
  require_once('controllers/Controller.php');

  class AccountController extends Controller {

    function subscribe(){
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

          if(!is_int(intval($addBdd))){
            echo 'Erreur avec la base de données. Réessayer l\'inscription.';
            include 'views/Account/Subscribe_form.php';
            return false;
          }
          else{
            $check = $form->user_exists($_POST['mail'], $password);

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
                include 'views/Account/Subscribe_ok.php';
              }
            }
          }
        }
        if($check_value == false){
          include 'views/Account/Subscribe_form.php';
        }
      }
      else{
        include 'views/Account/Subscribe_form.php';
      }
    }

    function login(){
      if(!empty($_POST)){
        include 'models/Model_account.php';
        include 'models/Model.php';
        $form = new Account;
        $password = $form->hash_password($_POST['password']);
        $check = $form->user_exists($_POST['identity'], $password);
        if($check == null){
          echo '<p>Ce compte n\'existe pas.</p>';
          include 'views/Account/Connexion_form.php';
        }
        else if(is_int(intval($check))){
          $user_infos = $form->read_user_info($check);
          if($user_infos == false){
            echo '<p>La connexion a échoué. Veuillez vérifier vos données et réessayer.</p>';
          }
          else{
            $_SESSION['idUser'] = $check;
        	  $_SESSION['fullName'] = $user_infos['fullName'];
        	  $_SESSION['displayName'] = $user_infos['displayName'];
        	  $_SESSION['mail']  = $user_infos['mail'];
            $_SESSION['idUrlAvatar']  = $user_infos['idUrlAvatar'];
            $_SESSION['theme']  = $user_infos['theme'];
            $_SESSION['userStatus'] = $user_infos['userStatus'];
            include 'views/layout/News_homepage.php';
            include 'views/Tweet/Form_tweet.php';
            include 'views/layout/End_page.php';
          }
        }
      }
      else{
        include 'views/Account/Connexion_form.php';
      }
    }

    function logout(){
      include 'models/Model_account.php';
      $session = new Account;
      $session->logout();
      include 'views/Account/Logout.php';
    }
  }
?>
