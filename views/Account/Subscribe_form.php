<?php include 'views/layout/Nav_login.php'; ?>

<section id="loginform" class="outer-wrapper">
  <div class="inner-wrapper">
    <div class="container">
      <div class="row">
        <h2>Formulaire d'inscription</h2>
        <div class="col-sm-4 col-sm-offset-4">
          <form method="POST">
            <div class="form-group">
              <label for="validationDefault01">Nom complet</label>
              <input type="text" class="form-control" id="validationDefault01" placeholder="fullname" name="fullname" required>
            </div>
            <div class="form-group">
              <label for="validationDefaultUsername">Pseudo</label>
                <input type="text" class="form-control" id="validationDefaultUsername" placeholder="displayname" name="displayname" required>
            </div>
            <div class="form-group">
              <label for="validationDefault03">Mail</label>
              <input type="email" class="form-control" id="validationDefault03" placeholder="email"  name="mail" required>
            </div>
            <div class="form-group">
              <label for="validationDefault04">Mot de passe</label>
              <input type="password" class="form-control" id="validationDefault04" placeholder="password" name="password" required>
            </div>
            <div class="col-sm-4 col-sm-offset-4">
              <button type="submit" class="btn btn-default">Valider</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
