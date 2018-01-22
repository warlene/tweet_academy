<div class="row">
  <div class="col-sm-12 col-lg-10">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <div class="display_tweet">
            <?php
            if($tweets['idUrlAvatar'] != null) {
                echo $tweets['idUrlAvatar'];
            }
            ?>
            <div class="head-tweet">
              <h4><span class="fullname"><strong><?= $tweets['fullName'] . " " ;?></strong></span><?= $tweets['displayName']  . " . " . $tweets['tweetDate'] ?></h4>
            </div>
            <p><?= $tweets['TweetContent'] ?></p>
            <?php
            if($tweets['imgUrl'] != null) {

                ?> <img src="images/imgUrl/<?=$tweets['imgUrl'];?>"><br>
                <?php
            }
            ?><br/>
            <a href="rooter.php?controller=tweet&action=send_answer_tweet&idtweet=<?= $tweets['idTweet']; ?>" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Répondre"></a>
            <a href="#" class="glyphicon glyphicon-refresh" data-toggle="tooltip" title="Retweeter"></a>
            <a href="#" class="glyphicon glyphicon-heart-empty" data-toggle="tooltip" title="J'aime"></a>


        </div>
      </div>
    </div>
  </div>
</div>
