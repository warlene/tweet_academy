



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
    if(isset($_FILES['imgUrl']) AND !empty($_FILES['imgUrl']['name']) || ((isset($tweetContent) && !empty($tweetContent)))) {

      $tailleMax = 2097152;
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['imgUrl']['size'] <= $tailleMax || ((isset($tweetContent) && !empty($tweetContent)))) {

        $extensionUpload = strtolower(substr(strrchr($_FILES['imgUrl']['name'], '.'), 1)); // recupere l'extension

        if(in_array($extensionUpload, $extensionsValides) || ((isset($tweetContent) && !empty($tweetContent)))) {
          // var_dump(in_array($extensionUpload, $extensionsValides));
          $chemin = "images/imgUrl/".$_FILES['imgUrl']['name'];
          $resultat = move_uploaded_file($_FILES['imgUrl']['tmp_name'], $chemin);

          if($resultat || ((isset($tweetContent) && !empty($tweetContent)))) {
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

/*    if (isset($tweetContent) && !empty($tweetContent)){
      $send_bdd = $form->send_tweet_in_bdd($idUser, $tweetContent, $imgUrl);
    }*/

  }

  public function count_tweet_controller(){
    $tweet = new Tweet;
    $idUser = $_SESSION['idUser'];
    $_SESSION['count'] = $tweet->count_tweet($idUser);
  }

  public function send_answer_tweet(){
    include 'views/Tweet/FormAnswerTweet.php';
   /* var_dump($_POST, $_FILES['imgUrl_answer_tweet']['name']);
    var_dump(isset($_POST['answer_tweet']));
    var_dump(isset(imgUrl_answer_tweet);
    var_dump(isset($_POST['answer_tweet_content']) && !empty($_POST['answer_tweet_content']));*/
    $form = new Tweet;
    $idUser = $_SESSION['idUser'];
    $answer_tweet_content = isset($_POST['answer_tweet_content']) ? $_POST['answer_tweet_content'] : null;
    $imgUrl_answer_tweet = isset($_POST['imgUrl_answer_tweet'])? $_POST['imgUrl_answer_tweet'] : null;
    $imgUrl_answer_tweet = isset($_FILES['imgUrl_answer_tweet']['name']) ? $_FILES['imgUrl_answer_tweet']['name'] : null; 
    $idtweet = isset($_GET['idtweet']) ? $_GET['idtweet'] : null;
    var_dump($idUser);
    var_dump($_GET['idtweet']);
    var_dump($answer_tweet_content);
    var_dump( $imgUrl_answer_tweet);

    if (!empty($answer_tweet_content) || !empty($imgUrl_answer_tweet)){
      $widthMax = 2097152;
      $validated_extention = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['imgUrl_answer_tweet']['size'] <= $widthMax || (!empty($answer_tweet_content) || !empty($imgUrl_answer_tweet))){
        $uploaded_extention = strtolower(substr(strchr($_FILES['imgUrl_answer_tweet']['name'], '.'), 1));
        if(in_array($uploaded_extention, $validated_extention) ||(!empty($answer_tweet_content) || !empty($imgUrl_answer_tweet)) ){

          $path = "images/imgUrl_answer_tweet".$_FILES['imgUrl_answer_tweet']['name'];
          $result = move_uploaded_file($_FILES['imgUrl_answer_tweet']['tmp_name'], $path);
          if ($result || (!empty($answer_tweet_content) || !empty($imgUrl_answer_tweet))){
            $add_answer_tweet = $form->answer_tweet($idUser, $idtweet, $answer_tweet_content, $imgUrl_answer_tweet);
          } else {
            $msg = "Erreur durant l'importation de votre photo";
          } 

        } else {
         $msg = "Votre photo doit être au format jpg, jpeg, gif ou png";
       }
     } else {
      $msg = "Votre photo ne doit pas dépasser 2Mo";
    }

  }

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
