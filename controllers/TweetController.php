<?php
class TweetController {

  public function print_tweet_controller(){
    // include 'models/Model.php';
    // $bdd = Model::bdd_connect();
    include 'models/Model_tweet.php';
    $tweet = new Tweet;

    $tweet->print_tweet();
  }

  public function send_form(){
    include 'models/Model_tweet.php';

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
}
?>
