<form action="" class="form" method="post" enctype="multipart/form-data">
  <label for="answer_tweet_content_<?=$tweets['idTweet'];?>"><h3>Ajouter un commentaire</h3></label>
  <textarea type="textarea" class="form-control" name="answer_tweet_content" id="answer_tweet_content_<?=$tweets['idTweet'];?>" placeholder="Ecrivez votre commentaire" maxlength="140" rows="3"></textarea>
  <label for ="imgUrl_answer_tweet_<?=$tweets['idTweet'];?>" class="glyphicon glyphicon-picture"></label>
  <input type="file" name="imgUrl_answer_tweet" class="picture" id="imgUrl_answer_tweet_<?=$tweets['idTweet'];?>">
  <input type="hidden" name="idTweet" value="<?=$tweets['idTweet'];?>">
  <input type="submit" class="btn btn-form" name="answer_tweet" value="Répondre">
</form>
