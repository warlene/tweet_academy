<?php
require_once('models/Model.php');

class Tweet {

  public function send_tweet_in_bdd($idUser, $tweetContent, $imgUrl, $idReTweet = null, $idReTweetFrom = null){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("INSERT INTO tweet SET idUser = :idUser, tweetContent = :tweetContent, imgUrl = :imgUrl, idReTweet = :idReTweet, idReTweetFrom = :idReTweetFrom, deleted = :deleted");
    

    if($tweet->execute(array(':idUser' => $idUser, ':tweetContent' => $tweetContent, ':imgUrl' => $imgUrl, ':idReTweet' => $idReTweet, ':idReTweetFrom' => $idReTweetFrom, ':deleted' => 'false'))) {
      /*include('views/Tweet/retweet.php');*/
      
      return $newTweet = $bdd->lastInsertId();
    }

    return $req->errorInfo();
  }


  public function print_tweet(){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("SELECT displayName, fullName, user.idUser,idUrlAvatar, tweetDate, TweetContent, imgUrl, idTweet FROM tweet INNER JOIN user ON tweet.idUser = user.idUser ORDER BY tweetDate DESC ");
    return $tweet;
  }

  public function print_tweet_user(){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("SELECT displayName, fullName, user.idUser,idUrlAvatar, tweetDate, TweetContent, imgUrl, idTweet FROM tweet INNER JOIN user ON tweet.idUser = user.idUser WHERE tweet.idUser = " .$_SESSION['idUser']. " ORDER BY tweetDate DESC ");

    $tweet->execute();

    while ($tweets = $tweet->fetch()) {
      include 'views/Tweet/Tweet.php';
    }
  }

  public function get_tweetContent(){
    $bdd = Model::bdd_connect();
    $sql = $bdd->prepare("SELECT *FROM tweet WHERE idtweet = ?");
    $sql->execute([$_GET['id']]);
    return $result= $sql->fetch();
  }



  public function retweet($idUser, $tweetContent, $imgUrl, $idReTweet, $idReTweetFrom){
    $bdd = Model::bdd_connect();
    $this->get_tweetContent();
    $query = $bdd->prepare("INSERT INTO tweet (idUser, tweetContent, imgUrl, idReTweet, idReTweetFrom) VALUES(?, ?, ?, ?, ?)");
    $query->execute([$idUser, $tweetContent, $imgUrl, $idReTweet, $idReTweetFrom]);


    //var_dump($_GET['id']);
    /*$bdd = Model::bdd_connect();
    $sql = $bdd->prepare("SELECT * FROM tweet WHERE idTweet = ? ");
    $sql->execute([$_GET['id']]);
    $result = $sql->fetch();
   
    $query = $bdd->prepare("INSERT INTO tweet (idUser, tweetContent, imgUrl, idReTweet, idReTweetFrom) VALUES(?, ?, ?, ?, ?)");
    $a = $query->execute([$idUser, $tweetContent, $imgUrl, $idReTweet, $idReTweetFrom]);


    return $result;*/

  }



  public function print_answer_tweet(){
    /*SELECT comment.idUser,fullName, displayName, commentContent, imgUrl, commentCreationDate FROM comment INNER JOIN user ON user.idUser = comment.idUser WHERE idTweet = 28 ORDER BY commentContent DESC */
    $bdd = Model::bdd_connect();
    $answer_tweet = $bdd->prepare("SELECT comment.idUser,fullName, displayName, commentContent, imgUrl, commentCreationDate 
      FROM comment 
      INNER JOIN user ON user.idUser = comment.idUser 
      WHERE idTweet = ? 
      ORDER BY commentContent DESC ");
    $answer_tweet->execute([$_GET['idtweet']]);
    while($all_answer_tweet = $answer_tweet->fetch()){
      include('views/Tweet/display_answer_tweet.php');
    }

  }

  public function count_tweet($idUser){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("SELECT count(idTweet) FROM tweet INNER JOIN user ON tweet.idUser = user.idUser WHERE user.idUser = ? ");

    $tweet->execute(array($idUser));
    $count = $tweet->fetch();
    return $count[0];
  }

  public function count_answers($idTweet){
    $bdd = Model::bdd_connect();
    $answer = $bdd->prepare("SELECT count(idComment) FROM comment INNER JOIN tweet ON comment.idTweet = tweet.idTweet WHERE tweet.idTweet = ? ");

    $answer->execute(array($idTweet));
    $count = $answer->fetch();
    return $count[0];
  }

  public function answer_tweet($idUser, $idtweet, $answer_tweet_content, $imgUrl_answer_tweet){
    $bdd = Model::bdd_connect();
    $sql = $bdd->prepare("INSERT INTO comment SET
      idUser = :idUser,
      idTweet = :idTweet,
      commentContent = :commentContent,
      imgUrl = :imgUrl");
    /*:imgUrl_answer_tweet = :imgUrl");*/
    $answer_tweet =  $sql->execute(array(
      ':idUser' => $idUser,
      ':idTweet' => $idtweet,
      ':commentContent' => $answer_tweet_content,
      ':imgUrl' => $imgUrl_answer_tweet

      ));
    return $answer_tweet;
  }





  /*public function Stock_hashtag($tag){
    $bdd = Model::bdd_connect();
    $hashtag = $bdd->prepare("INSERT INTO tag VALUES(idTweet,tagName)");
  }*/
  /*public function Find_hashtag($tweetContent){
    $tweet .=' ';
    preg_match_all('/#[0-9a-z-A-Z]*) /', $tweetContent,$hashtag);
    if (isset($hashtag[1])){
      return $hashtag [1];
    }
    return null;
  }*/
}
?>
