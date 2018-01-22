<?php
// include'Tweet.php';
?>


<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <h2>Repondre  à tweet</h2>

        <form action="" method="post" enctype="multipart/form-data">
          <div>
            <label for="answer_tweet_content">Réponse :</label>
            <textarea type="textarea" name="answer_tweet_content" id="answer_tweet_content"  rows="3" cols="60"></textarea><br><br>
          </div>

          <div>
            <label for ="imgUrl_answer_tweet">Image :</label>
            <input type="file" name="imgUrl_answer_tweet" id="imgUrl_answer_tweet">
          </div>



          <input type="submit" name="answer_tweet" value="Répondre">
          <br><br>
        </form>
        <!-- <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-thumbs-up"></span> Like
        </button> -->
      </div>
    </div>
  </div>
</div>
