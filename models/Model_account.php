<?php
class Account {
  private $salt = "si tu aimes la wac tape dans tes mains";

  public function check_form_values(){
    $error = array();
    if(preg_match("/[^a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-] | ^\s/", $_POST['fullname'], $matches)){
      $error[] = 'Les caractères spéciaux sont interdits.';
    }

    if(preg_match("/[^a-zA-Z0-9_]/", $_POST['displayname'], $matches)){
      $error[] = 'Seuls les caractères alphanumériques et _ sont autorisés. Les espaces sont interdits.';
    }

    if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false){
      $error[] = "L'adresse mail est invalide.";
    }
    if(!empty($error)){
      foreach ($error as $value) {
        echo '<p>' . $value . '</p>';
      }
      return false;
    }
    else {
      return true;
    }
  }

  public function add_to_bdd($fullname, $displayname, $mail, $password){
    $bdd = Model::bdd_connect();
    $req = $bdd->prepare("INSERT INTO user SET
  		fullName = :fullname,
      displayName = :displayname,
  		mail = :mail,
  		password = :password,
  		registrationDate = NOW()");
    $req->execute(array(':fullname' => $fullname, ':displayname' => $displayname, ':mail' => $mail, ':password' => $password));
    return $req->errorInfo();
  }

  public function hash_password($password){
    $hash_password = hash('ripemd160', $password . $this->salt);
    return $hash_password;
  }
}
?>
