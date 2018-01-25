<?php
require_once ('models/Model_account.php');
$date = new Account;
$date_ok = $date->change_date( $tweets['tweetDate']);
?>

<div class="row" id="myTweet">
  <div class="col-lg-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <div class="display_tweet">
            <?php
            if($tweets['idUrlAvatar'] != null) {
                echo $tweets['idUrlAvatar'];
            }
            ?>
            <div class="head-tweet">
              <div class="line">
                <div class="name">
                  <h4><span class="fullname"><strong><?= $tweets['fullName'] . " " ;?></strong></span><?= $tweets['displayName']  . " . " . $date_ok ?></h4>
                </div>
                <div class="follow">
                    <?php include 'views/Tweet/Follow_button.php'; ?>
                </div>
              </div>
              <div class="follow">

                <?php include 'views/Tweet/Follow_button.php'; ?>

              </div>
            </div>
          </div>
          <p><?= $tweets['TweetContent'] ?></p>
          <?php
          if($tweets['imgUrl'] != null) {
            ?> <img src="images/imgUrl/<?=$tweets['imgUrl'];?>"><br>
            <?php
          }
          ?><br/>

          <a href="#<?=$tweets['idTweet'];?>" class="glyphicon glyphicon-pencil" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?=$tweets['idTweet'];?>" title="Répondre"><li><?php if($_SESSION['countAnswers'] >0){ echo $_SESSION['countAnswers']; };?></li></a>
          <a href="rooter.php?controller=tweet&action=retweet&id=<?=$tweets['idTweet'];?>" class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Retweeter"></a>
          <a href="#" class="glyphicon glyphicon-heart-empty" data-toggle="tooltip" title="J'aime"></a><br/><br/>
          <div class="collapse multi-collapse" id="<?=$tweets['idTweet'];?>">
            <?php include 'views/Tweet/FormAnswerTweet.php'; ?>
          </div>
