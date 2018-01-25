<?php
  require_once('controllers/TweetController.php');
  require_once('controllers/UserController.php');

  class Controller {

    public function index(){
      if(empty($_SESSION)){
        include 'views/layout/Homepage.php';
      }
      if(isset($_SESSION['idUser'])){
        $tweet = new TweetController;
        if(isset($_POST['content_tweet'])){
          $tweet->send_form();
          $tweet->retweet();

        }
        $tweet->count_tweet_controller();

        $follow = new UserController;
        $follow->count_followers_controller();
        $follow->count_followings_controller();
        $follow->count_likes_controller();

        include 'views/layout/News_homepage.php';
        include 'views/Tweet/Form_tweet.php';
        if(isset($_POST['answer_tweet_content'])){
          $tweet->send_answer_tweet($_POST['idTweet']);
        }
        $tweet->print_tweet_controller();

        include 'views/layout/End_page.php';
      }
    }
  }
?>
