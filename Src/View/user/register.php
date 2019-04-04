<section class="chapter-comments-wrapper box">
  <h1>User Inscription</h1>
  <?php
  if (isset($this->error['register'])) {
  ?>
  <p>Veuillez remplir tous les champs pour vous inscrire</p>
  <?php
  }
  else if (isset($this->error['password'])) {
  ?>
  <p>Les mots de passe ne correspondent pas</p>
  <?php
  }
  else if ($this->error['userName']) {
  ?>
  <p>Ce nom est déjà pris !</p>
  <?php
  }
  ?>
  <form method="post">
    <input type="text" name="name" placeholder="Nom" class="comment-form"><br>
    <input type="password" name="password" placeholder="Mot de passe" class="comment-form"><br>
    <input type="password" name="password-confirm" placeholder="Confirmez le mot de passe" class="comment-form"><br>
    <button type="submit" class="form-button">Inscription</button>
  </form>
  <a class="user-link" href="login">Déjà inscrit ? Connectez-vous ici</a>
</section>
