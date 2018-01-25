<?php
  require_once('models/Model.php');

  class Follow {
    public function check_follow($following, $follower){
      $bdd = Model::bdd_connect();
      $follow = $bdd->query("SELECT idFollowed, idFollower, followStatus
                             FROM follow
                             WHERE idFollowed = $following AND idFollower = $follower AND followStatus = 'true'");
      $check = $follow->fetch(PDO::FETCH_ASSOC);
      return $check;
    }

    public function follow_add_to_bdd($following, $follower){
      $bdd = Model::bdd_connect();
      $insert = $bdd->prepare("INSERT INTO follow
                               SET idFollowed = :idUserFollowed, idFollower = :idUserfollower");

      if($insert->execute(array(':idUserFollowed' => $following, ':idUserfollower' => $follower))) {
        $add_ok = $this->check_follow($following, $follower);
        return $add_ok;
      }
      return $req->errorInfo();
    }

    public function change_followStatus($idFollowed, $idFollower, $status){
      $bdd = Model::bdd_connect();
      $insert = $bdd->prepare("UPDATE follow
                               SET followStatus = :status
                               WHERE idFollowed = :idFollowed && idFollower = :idFollower");
      $insert->execute(array(':status' => "$status", ':idFollowed' => $idFollowed, ':idFollower' => $idFollower));
    }
  }
?>
