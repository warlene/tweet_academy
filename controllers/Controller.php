<?php
  class Controller {

    public function index(){
      if(empty($_SESSION)){
        include 'views/layout/Homepage.php';
      }
      if(isset($_SESSION['idUser'])){
        include 'controllers/TweetController.php';
        $tweet = new TweetController;
        if(isset($_POST['content_tweet'])){
          $tweet->send_form();
        }
        $tweet->count_tweet_controller();
        var_dump($_SESSION);
        include 'views/layout/News_homepage.php';
        include 'views/Tweet/Form_tweet.php';
        include 'views/Tweet/formReTweeter.php';

        $tweet->print_tweet_controller();
        include 'views/layout/End_page.php';
      }
    }
  }
?>
