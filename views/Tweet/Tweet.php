<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <div class="display_tweet">
            <?php
            if($tweets['idUrlAvatar'] != null) {
                echo $tweets['idUrlAvatar'];
            }
            ?>
            <span><strong>FullName : </strong><?= $tweets['fullName'] ?></span><br>
            <span><strong>Pseudo : </strong><?= $tweets['displayName'] ?></span><br>
            <span><strong>Tweet : </strong><?= $tweets['TweetContent'] ?></span><br>
            <span><strong>Date de publication : </strong><?= $tweets['tweetDate'] ?></span><br>
            <?php
            if($tweets['imgUrl'] != null) {
                var_dump($tweets['imgUrl']);
                var_dump($_FILES);
                var_dump($_SESSION);
                var_dump($tweets);
                
                ?> <img src="images/imgUrl/<?=$tweets['imgUrl'];?>">
                <?php
            }
            ?>
            <a href="views/Tweet/formReTweeter.php">Repondre</a>
            <a href="#">Retweet</a>
            <a href="#">J'aime</a>

        </div>
      </div>
    </div>
  </div>
</div>
