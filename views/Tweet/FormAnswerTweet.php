<form action="" class="form" method="post" enctype="multipart/form-data">
  <label for="answer_tweet_content_<?=$tweets['idTweet'];?>"><h3>Ajouter un commentaire</h3></label>
  <textarea type="textarea" class="form-control" name="answer_tweet_content" id="answer_tweet_content_<?=$tweets['idTweet'];?>" placeholder="Ecrivez votre commentaire" maxlength="140" rows="3"></textarea>
  <label for ="imgUrl_answer_tweet_<?=$tweets['idTweet'];?>">
    <i class="glyphicon glyphicon-picture"></i>
  </label>
  <input type="file" name="imgUrl_answer_tweet" class="picture" id="imgUrl_answer_tweet_<?=$tweets['idTweet'];?>" style="display:none;">
  <input type="hidden" name="idTweet" value="<?=$tweets['idTweet'];?>">
  <input type="submit" class="btn btn-form" name="answer_tweet" value="Répondre"><br/><br/>
</form>
<?php while ($comment = $answer_tweet->fetch()) { ?>
  <div class="" id="<?=$tweets['idTweet'];?>">
  	<div class="row">
  	  <div class="col-sm-12">
  	    <div class="panel panel-default text-left">
  	      <div class="panel-footer">
            <p><span>De : </span><?= $comment['fullName'] . " - " . $comment['displayName']; ?></p>
            <p><span>commentaire : </span><?= $comment['commentContent']; ?></p>
  	      </div>
  	    </div>
  	  </div>
  	</div>
  </div>

<?php } ?>
