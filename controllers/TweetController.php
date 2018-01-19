<?php
include 'models/Model_tweet.php';

class TweetController {

  public function print_tweet_controller(){
    // if(!isset($_POST['content_tweet'])){

    // }
    $tweet = new Tweet;
    $tweet->print_tweet();
  }

  public function check_picture(){
    $maxwidth = 1080;
    $maxheight = 1920;
    $erreur = array();
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['fileToUpload']['name'], '.')  ,1)  );

    if ($_FILES['fileToUpload']['error'] > 0){
      $erreur[] = "Erreur lors du transfert";
    }
    if ($_FILES['fileToUpload']['size'] > $maxsize){
      $erreur[] = "Le fichier est trop gros";
    }

    $image_sizes = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
      $erreur[] = "Image trop grande";
    }
    if (!empty($erreur)){
      foreach($erreur as $e){
        echo $e;
      }
    }
    else{
      if ( in_array($extension_upload,$extensions_valides) ){
        $nom = "images/avatars/" . $idUser . $extension_upload;
        $resultat = move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$nom);
      }
    }
  }

  public function send_form(){
    $form = new Tweet;
    $idUser = $_SESSION['idUser'];
    $tweetContent = $_POST['content_tweet'];
    check_picture();

    if(empty($_POST['fileToUpload'])){
      $imgUrl = null;
    }
    else{
      $imgUrl = $_FILES['fileToUpload'];
    }
    var_dump($image_sizes);
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
