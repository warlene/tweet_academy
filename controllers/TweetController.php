<?php
include 'models/Model_tweet.php';
include 'controllers/FollowController.php';

class TweetController {

  public function print_tweet_controller(){
    $tweet = new Tweet;
    $print_tweet = $tweet->print_tweet();
    $print_tweet->execute();
    $answer_tweet = $this->display_answer_tweet();
    $follow = new FollowController;
//fetchALL
    while ($tweets = $print_tweet->fetch()) {
      $answer_tweet->execute(array(':idTweet' => $tweets['idTweet']));
      $answer_count = $this->count_answers_controller($tweets['idTweet']);
      include 'views/Tweet/Tweet.php';
      include 'views/Tweet/End_tweet.php';
    }

  }
  
  public function send_form(){
   

    $form = new Tweet;
    $idUser = $_SESSION['idUser'];
    $imgUrl = $_FILES['imgUrl']['name'];

    $tweetContent = $_POST['content_tweet'];
    if(isset($_FILES['imgUrl']) AND !empty($_FILES['imgUrl']['name']) || ((isset($tweetContent) && !empty($tweetContent)))) {


    /*public function Find_hashtag($tweetContent){
    $tweet .=' ';
    preg_match_all('/#[0-9a-z-A-Z]*) /', $tweetContent,$hashtag);
    if (isset($hashtag[1])){
      return $hashtag [1];
    }
    return null;
  }*/

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



            $hashtag = $this->find_hashtag($tweetContent);
            var_dump($hashtag);
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



  public function retweet (){
    $retweet = new Tweet(); 
   
    $idUser = $_SESSION['idUser'];

    $result = $retweet->get_tweetContent();
    $tweetContent = $result['tweetContent'];
    $imgUrl = $result['imgUrl'];
    $idReTweet = $_GET['id'];
    $idReTweetFrom = $result['idUser'];
    $retweet->get_tweetContent(); 
    if(isset($_POST['retweet_form'])){
    $tweetContent .= $_POST['text_retweet'];
    $retweet->retweet($idUser, $tweetContent, $imgUrl, $idReTweet, $idReTweetFrom);
   /* header('Location: views/Tweet/tweet.php');
*/
    
    }
    
    include'views/Tweet/retweet.php';

    
  }


  public function display_answer_tweet(){
    $tweet = new Tweet();
    $comment = $tweet->print_answer_tweet();
    return $comment;
  }



  public function count_tweet_controller(){
    $tweet = new Tweet;
    $idUser = $_SESSION['idUser'];
    $_SESSION['count'] = $tweet->count_tweet($idUser);
  }

  public function count_answers_controller($idTweet){
    $answer = new Tweet;
    $countAnswers = $answer->count_answers($idTweet);
    $_SESSION['countAnswers'] = $countAnswers;
  }

  public function send_answer_tweet($idtweet){
    $form = new Tweet;
    $idUser = $_SESSION['idUser'];
    $answer_tweet_content = isset($_POST['answer_tweet_content']) ? $_POST['answer_tweet_content'] : null;
    $imgUrl_answer_tweet = isset($_POST['imgUrl_answer_tweet'])? $_POST['imgUrl_answer_tweet'] : null;
    $imgUrl_answer_tweet = isset($_FILES['imgUrl_answer_tweet']['name']) ? $_FILES['imgUrl_answer_tweet']['name'] : null;

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

 /*public function Find_hashtag($tweetContent){
   // $tweet .=' ';
    preg_match_all('/#[0-9a-z-A-Z]*) /', $tweetContent,$hashtag);
    if (isset($hashtag[1])){
      var_dump($hashtag);
      var_dump($hashtag[1]);
      return $hashtag [1];
    }
    return null;
  }*/






}
?>
