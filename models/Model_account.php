<?php
class Account {
  public function check_form_values(){
    // var_dump($_POST['displayname']);
    // var_dump($_POST['fullname']);
    // var_dump($_POST['mail']);
    // var_dump($_POST['password']);
    var_dump(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL));
    if(preg_match("/[^a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]/", $_POST['fullname'], $matches)){
      echo 'Les caractères spéciaux sont interdits';
      return false;
    }
    else{
      echo "les caractères alphanumériques sont autorisés\n";
    }
    if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false){
      echo "L'adresse mail est invalide.";
      return false;
    }
    else{
      echo "L'adresse mail est valide";
    }
    return true;
  }

  public function add_to_bdd(){
    
  }
}
?>
