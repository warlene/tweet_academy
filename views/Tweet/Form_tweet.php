<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default text-left">
      <div class="panel-body">
        <h2>Ajouter un tweet</h2>

        <form action="" method="post" enctype="multipart/form-data">
          <div>
            <label for="content_tweet">Content :</label>
            <textarea type="file" name="content_tweet" id="content_tweet" maxlength="140" rows="3" cols="60"></textarea><br><br>
          </div>

          <div>
            <label for ="fileToUpload">Select image to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
          </div>

          <input type="submit" name="add_tweet">
          <br><br>
        </form>
        <!-- <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-thumbs-up"></span> Like
        </button> -->
      </div>
    </div>
  </div>
</div>
