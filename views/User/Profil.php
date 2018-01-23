<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/67239/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="//use.typekit.net/psm0wvc.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<div class="cover-photo"></div>
<div class="body">

  <section class="left-col user-info">
    <div class="profile-avatar">
      <div class="inner"></div>
    </div>
    <h1><?php echo $_SESSION['fullName'] ?></h1>
    <h2><?php echo $_SESSION['displayName'] ?></h2>
    <div class="meta">
      <p><i class="glyphicon glyphicon-calendar"></i> Membre depuis le <?= $_SESSION['registrationDate'] ?></p>
    </div>
  </section>

  <section class="nav-profil">
    <nav class="profile-nav">
      <div class="container-fluid">
        <div class="collapse navbar-collapse col-md-6" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="rooter.php?controller=user&action=profil" class="<?php if(isset($_GET['action']) && $_GET['action']=='profil'){ ?>active<?php } ?>" title="<?= $_SESSION['count']; ?> Tweets">
              <span class="twPc-StatLabel twPc-block">Tweets</span>
              <span class="twPc-StatValue"><?= $_SESSION['count']; ?></span>
            </a></li>
            <li><a href="" title="<?= $_SESSION['countFollowers']; ?> Followers">
              <span class="twPc-StatLabel twPc-block">Followers</span>
              <span class="twPc-StatValue"><?= $_SESSION['countFollowers']; ?></span>
            </a></li>
            <li><a href="" title="<?= $_SESSION['countFollowings']; ?> Followings">
              <span class="twPc-StatLabel twPc-block">Followings</span>
              <span class="twPc-StatValue"><?= $_SESSION['countFollowings']; ?></span>
            </a></li>
            <li><a href="" title="Likes">
              <span class="twPc-StatLabel twPc-block">J'aime</span>
              <span class="twPc-StatValue"><?= $_SESSION['countLikes']; ?></span>
            </a></li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
