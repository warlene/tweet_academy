<?php
// include'Tweet.php';
?>


<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <h2>Retweet au tweet</h2>

        <form action="" method="post" enctype="multipart/form-data">
          <div>
            <label for="commentContent">Répondre au tweet :</label>
            <textarea type="textarea" name="commentContent" id="commentContent"  rows="3" cols="60"></textarea><br><br>
          </div>

          <div>
            <label for ="imgUrl">Image :</label>
            <input type="file" name="imgUrl" id="imgUrl">
          </div>



          <input type="submit" name="re_tweet" value="Répondre">
          <br><br>
        </form>
        <!-- <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-thumbs-up"></span> Like
        </button> -->
      </div>
    </div>
  </div>
</div>
