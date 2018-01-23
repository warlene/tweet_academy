<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-sm-6">

      <div class="card hovercard">
        <div class="cardheader">
        </div>

        <div class="avatar">
            <img alt="" src="images/factory.png">
        </div>

        <div class="info">
            <div class="title">
                <a target="_blank" href="images/factory.png"><?= $_SESSION['fullName'] ?></a>
            </div>
            <div class="desc" href="views/User/User_Profil.php"><?= $_SESSION['displayName'] ?></div>
        </div>

        <div class="twPc-divStats">
      		<ul class="twPc-Arrange">
      			<li class="twPc-ArrangeSizeFit">
      				<a href="" title="<?= $_SESSION['count']; ?> Tweet">
      					<span class="twPc-StatLabel twPc-block">Tweets</span>
      					<span class="twPc-StatValue"><?= $_SESSION['count']; ?></span>
      				</a>
      			</li>
      			<li class="twPc-ArrangeSizeFit">
      				<a href="" title="<?= $_SESSION['countFollowings']; ?> Following">
      					<span class="twPc-StatLabel twPc-block">Abonnements</span>
      					<span class="twPc-StatValue"><?= $_SESSION['countFollowings']; ?></span>
      				</a>
      			</li>
      			<li class="twPc-ArrangeSizeFit">
      				<a href="" title="<?= $_SESSION['countFollowers']; ?> Followers">
      					<span class="twPc-StatLabel twPc-block">Abonnés</span>
      					<span class="twPc-StatValue"><?= $_SESSION['countFollowers']; ?></span>
      				</a>
      			</li>
      		</ul>
      	</div>

      </div>
    </div>
	</div>
</div>
