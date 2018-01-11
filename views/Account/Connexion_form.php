<?php include 'views/layout/Nav_login.php'; ?>

<section id="loginform" class="outer-wrapper">
  <div class="inner-wrapper">
    <div class="container">
      <div class="row">
        <h2>Connectez-vous</h2>
        <div class="col-sm-4 col-sm-offset-4">
          <form method="POST">
            <div class="form-group">
              <label for="exampleDropdownFormEmail2">Identifiant</label>
              <input type="text" class="form-control" id="exampleDropdownFormEmail2" name="identity" placeholder="email@example.com">
            </div>
            <div class="form-group">
              <label for="exampleDropdownFormPassword2">Mot de passe</label>
              <input type="password" class="form-control" id="exampleDropdownFormPassword2" name="password" placeholder="Password">
            </div>
            <div class="col-sm-4 col-sm-offset-4">
              <button type="submit" class="btn btn-default">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
