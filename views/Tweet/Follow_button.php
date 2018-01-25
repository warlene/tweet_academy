<?php
  require_once('models/Model_follow.php');
  $follow = new Follow;
  $check = $follow->check_follow($tweets['idUser'], $_SESSION['idUser']);
  if ($check['followStatus'] == "true"){
?>
<input type="button" class="btn btn-form subscribeBtn" data-user-id="<?= $tweets['idUser']; ?>" data-idFollower="<?= $_SESSION['idUser']; ?>" value="Abonné" />

<?php } if($check == false || $check['followStatus'] == "false"){ ?>
  <input type="button" class="btn btn-form subscribeBtn" data-user-id="<?= $tweets['idUser']; ?>" data-idFollower="<?= $_SESSION['idUser']; ?>" value="S'abonner" />
<?php } ?>
