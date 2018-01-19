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
    $form = new Tweet;
    $idUser = $_SESSION['idUser'];
    $tweetContent = $_POST['content_tweet'];

    if(empty($_POST['fileToUpload'])){
      $imgUrl = null;
    }
    else{
      $imgUrl = $_FILES['fileToUpload'];
    }
    $send_bdd = $form->send_tweet_in_bdd($idUser, $tweetContent, $imgUrl);
  }

  public function count_tweet_controller(){
    $tweet = new Tweet;
    $idUser = $_SESSION['idUser'];
    $_SESSION['count'] = $tweet->count_tweet($idUser);
  }

    public function findTweetByHashtag(){
      $hashtag = new tweet;
      $tweetContent = $_POST['content_tweet'];
      $hashtag-> Find_hashtag($tweetContent)
  }
  public function Stock_hastag_Controller(){
    $tag = findTweetByHashtag();
    if ($tag = null) {
        return false;
    }
    else{
      $hashtag = new tweet;
      $hashtag->Stock_hashtag($tag);
    }
  }
}
?>
