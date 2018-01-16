<?php
class Tweet {

  Public function send_tweet_in_bdd($idUser, $tweetContent, $imgUrl, $idReTweet = null, $idReTweetFrom = null){
    include 'models/Model.php';
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("INSERT INTO tweet SET idUser = :idUser, tweetContent = :tweetContent, imgUrl = :imgUrl, idReTweet = :idReTweet, idReTweetFrom = :idReTweetFrom, deleted = :deleted");

    if($tweet->execute(array(':idUser' => $idUser, ':tweetContent' => $tweetContent, ':imgUrl' => $imgUrl, ':idReTweet' => $idReTweet, ':idReTweetFrom' => $idReTweetFrom, ':deleted' => 'false'))) {
        return $bdd->lastInsertId();
    }
    return $req->errorInfo();
  }

  public function print_tweet(){
    include 'models/Model.php';
    $bdd = Model::bdd_connect();
    $tweet = $bdd->prepare("SELECT displayName, fullName, user.idUser,idUrlAvatar, tweetDate, TweetContent, imgUrl, idTweet FROM tweet INNER JOIN user ON tweet.idUser = user.idUser ORDER BY tweetDate DESC ");

    $tweet->execute();
    // var_dump(isset($_FILES['fileToUpload']));
    // var_dump($_FILES['fileToUpload']);
    // var_dump($_FILES['fileToUpload']['name']);
    // var_dump(empty($_FILES['fileToUpload']['name']));
    // var_dump(isset($_FILES['fileToUpload']) AND !empty($_FILES['fileToUpload']['name']));
    // $extensionUpload = strtolower(substr(strrchr($_FILES['fileToUpload']['name'], '.'), 1));
    // var_dump($extensionUpload = strtolower(substr(strrchr($_FILES['fileToUpload']['name'], '.'), 1)));

    while ($tweets  = $tweet->fetch()) {
      // var_dump("avatars/".$tweets['idUser'].".".$extensionUpload);
      // var_dump("avatars/".$_FILES['fileToUpload']['name']);
      include 'views/Tweet/Tweet.php';
    }
  }

}
?>
