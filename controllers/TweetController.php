



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
    $imgUrl = $_FILES['imgUrl']['name'];

    $tweetContent = $_POST['content_tweet'];
    if(isset($_FILES['imgUrl']) AND !empty($_FILES['imgUrl']['name'])) {

      $tailleMax = 2097152;
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['imgUrl']['size'] <= $tailleMax) {

        $extensionUpload = strtolower(substr(strrchr($_FILES['imgUrl']['name'], '.'), 1)); // recupere l'extension

        if(in_array($extensionUpload, $extensionsValides)) {
          var_dump(in_array($extensionUpload, $extensionsValides));
          $chemin = "images/imgUrl/".$_FILES['imgUrl']['name'];
          $resultat = move_uploaded_file($_FILES['imgUrl']['tmp_name'], $chemin);

          if($resultat) {
            $send_bdd = $form->send_tweet_in_bdd($idUser, $tweetContent, $imgUrl);

          } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
          }
        } else {
          $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
      } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
      }
    }

  }

   public function count_tweet_controller(){
    $tweet = new Tweet;
    $idUser = $_SESSION['idUser'];
    $_SESSION['count'] = $tweet->count_tweet($idUser);
  }



  public function findTweetByHashtag(){
    $hashtag = new tweet;
    $tweetContent = $_POST['content_tweet'];
    $hashtag-> Find_hashtag($tweetContent);
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
