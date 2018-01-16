<?php
include 'models/Model_tweet.php';

class TweetController {

  public function print_tweet_controller(){
    // if(!isset($_POST['content_tweet'])){

    // }
    $tweet = new Tweet;
    $tweet->print_tweet();
  }

  public function send_form(){
    // include 'models/Model_tweet.php';

    $form = new Tweet;
    $idUser = $_SESSION['idUser'];
    $tweetContent = $_POST['content_tweet'];

    if(empty($_POST['fileToUpload'])){
      $imgUrl = null;
    }
    else{
      $imgUrl = $_POST['fileToUpload'];
    }

    $send_bdd = $form->send_tweet_in_bdd($idUser, $tweetContent, $imgUrl);
  }

  public function count_tweet_controller(){
    $tweet = new Tweet;
    $idUser = $_SESSION['idUser'];
    $_SESSION['count'] = $tweet->count_tweet($idUser);
  }
}
?>
