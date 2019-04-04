<section class="chapter-comments-wrapper box">
  <h1>User Login</h1>
  <?php
  if (isset($this->error['login'])) {
  ?>
  <p>Veuillez remplir tous les champs pour vous connecter</p>
  <?php
  }
  else if (isset($this->error['name'])) {
  ?>
  <p>Le nom n'est pas valide</p>
  <?php
  }
  else if ($this->error['password']) {
  ?>
  <p>Le mot de passe n'est pas valide</p>
  <?php
  }
  ?>
  <form method="post">
    <input type="text" name="name" placeholder="Nom" class="comment-form"><br>
    <input type="password" name="password" placeholder="Mot de passe" class="comment-form"><br>
    <button type="submit" class="form-button">Connexion</button>
  </form>
  <a class="user-link" href="register">Pas encore inscrit ? Inscrivez-vous ici</a>
</section>
