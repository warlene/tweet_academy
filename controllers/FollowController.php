<?php
  require_once('models/Model_follow.php');
  class FollowController {

    public function check_already_follow_controller($following, $follower){
      $follow = new Follow;
      $check = $follow->check_follow($following, $follower);
      return $check;
    }

    public function following() {
      $follow = new Follow;
      $idFollowed = $_POST['idUserFollowed'];
      $idFollower = $_SESSION['idUser'];
      if($idFollowed != $idFollower){
        $check = $this->check_already_follow_controller($idFollowed, $idFollower);
        if($check == false){
          $follow->follow_add_to_bdd($idFollowed, $idFollower);
        }
        if(isset($check['followStatus']) && $check['followStatus'] == 'false'){
          $follow->change_followStatus($idFollowed, $idFollower, 'true');
        }
      }
    }

    public function unfollow() {
      $follow = new Follow;
      $idFollowed = $_POST['idUserFollowed'];
      $idFollower = $_SESSION['idUser'];
      $follow->change_followStatus($idFollowed, $idFollower, 'false');
      // $check = $this->check_already_follow_controller($idFollowed, $idFollower);
      // var_dump($check);
    }
  }
?>
