<?php
require_once('models/Model_tweet.php');
require_once('models/Model_account.php');

class UserController {

  public function print_tweetUser_controller(){
    $tweet = new Tweet;
    $tweet->print_tweet_user();
  }

  public function profil() {
    include 'views/layout/Nav.php';
    include 'views/User/Profil.php';
    $this->print_tweetUser_controller();
    include 'views/layout/End_page.php';
  }

  public function count_followers_controller(){
    $user = new Account;
    $countFollowers =  $user->count_followers($_SESSION['idUser']);
    $_SESSION['countFollowers'] = $countFollowers;
  }

  public function count_followings_controller(){
    $user = new Account;
    $countFollowings = $user->count_followings($_SESSION['idUser']);
    $_SESSION['countFollowings'] = $countFollowings;
  }

  public function count_likes_controller(){
    $user = new Account;
    $countLikes = $user->count_likes($_SESSION['idUser']);
    $_SESSION['countLikes'] = $countLikes;
  }
}
?>
