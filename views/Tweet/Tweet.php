<?php
  require_once ('models/Model_account.php');
  $date = new Account;
  $date_ok = $date->change_date( $tweets['tweetDate']);
?>

<div class="row">
  <div class="col-lg-12 col-sm-6">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <div class="display_tweet">
            <?php
            if($tweets['idUrlAvatar'] != null) {
                echo $tweets['idUrlAvatar'];
            }
            ?>
            <div class="head-tweet">
              <h4><span class="fullname"><strong><?= $tweets['fullName'] . " " ;?></strong></span><?= $tweets['displayName']  . " . " . $date_ok ?></h4>
            </div>
            <p><?= $tweets['TweetContent'] ?></p>
            <?php
            if($tweets['imgUrl'] != null) {
                ?> <img src="images/imgUrl/<?=$tweets['imgUrl'];?>"><br>
                <?php
            }
            ?><br/>
            <a href="#<?=$tweets['idTweet'];?>" class="glyphicon glyphicon-pencil" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?=$tweets['idTweet'];?>" title="Répondre"></a>
            <a href="#" class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Retweeter"></a>
            <a href="#" class="glyphicon glyphicon-heart-empty" data-toggle="tooltip" title="J'aime"></a><br/><br/>
            <div class="collapse" id="<?=$tweets['idTweet'];?>">
              <?php include 'views/Tweet/FormAnswerTweet.php'; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
