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
      echo '<ul>'."\n";
      foreach($error as $e) {
        echo '	<li>'.$e.'</li>'."\n";
      }
      echo '</ul>';
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
    if ($req->execute(array(':fullname' => $fullname, ':displayname' => $displayname, ':mail' => $mail, ':password' => $password))) {
  		return $bdd->lastInsertId();
  	}
  	 return $req->errorInfo();
  }

  public function hash_password($password){
    $hash_password = hash('ripemd160', $password . $this->salt);
    return $hash_password;
  }

  public function user_exists($identity, $password){
    $bdd = Model::bdd_connect();
    $req = $bdd->prepare("SELECT idUser, fullName, mail, password FROM user WHERE (fullName = :value OR mail = :value) AND password = :password");
    $req->execute(array(':value' => $identity, ':password' => $password));
    $result =$req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $result['idUser'];
  }

  public function read_user_info($idUser) {
    $bdd = Model::bdd_connect();
  	  $requete = $bdd->prepare("SELECT idUser, fullName, displayName, mail, password, idUrlAvatar, theme, registrationDate, userStatus
  		  FROM user
  		  WHERE idUser = :iduser");
      $requete->bindValue(':iduser', $idUser);
      $requete->execute();
      if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
  		  $requete->closeCursor();
  		  return $result;
  	  }
  	return false;
  }

  public function logout(){
    $_SESSION = array();
    session_destroy();
    return true;
  }
}
?>
