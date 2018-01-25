<?php
require_once('models/Model_tweet.php');
?>
<h2>Retweeter</h2>


<form method="post" action="rooter.php?controller=tweet&action=retweet&id=<?=$_GET['id'];?>"">
  <label for ="text_retweet">
    <input type="text" name="text_retweet" value="<?= $tweetContent;?>">
    <input type="submit" name="retweet_form" value="Retweeter">
  </label>
</form>

<?php


?>