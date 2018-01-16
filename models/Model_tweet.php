<?php
include 'models/Model.php';

class Tweet {

  Public function send_tweet_in_bdd($idUser, $tweetContent, $imgUrl, $idReTweet = null, $idReTweetFrom = null){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("INSERT INTO tweet SET idUser = :idUser, tweetContent = :tweetContent, imgUrl = :imgUrl, idReTweet = :idReTweet, idReTweetFrom = :idReTweetFrom, deleted = :deleted");

    if($tweet->execute(array(':idUser' => $idUser, ':tweetContent' => $tweetContent, ':imgUrl' => $imgUrl, ':idReTweet' => $idReTweet, ':idReTweetFrom' => $idReTweetFrom, ':deleted' => 'false'))) {
        return $bdd->lastInsertId();
    }
    return $req->errorInfo();
  }

  public function print_tweet(){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("SELECT displayName, fullName, user.idUser,idUrlAvatar, tweetDate, TweetContent, imgUrl, idTweet FROM tweet INNER JOIN user ON tweet.idUser = user.idUser ORDER BY tweetDate DESC ");

    $tweet->execute();

    while ($tweets  = $tweet->fetch()) {
      include 'views/Tweet/Tweet.php';
    }
  }

  public function count_tweet($idUser){
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("SELECT count(idTweet) FROM tweet INNER JOIN user ON tweet.idUser = user.idUser WHERE user.idUser = ? ");

    $tweet->execute(array($idUser));
    $count = $tweet->fetch();
    return $count[0];
  }
}
?>