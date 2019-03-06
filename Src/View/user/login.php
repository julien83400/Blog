<a href="register">Pas encore inscrit ? Inscrivez-vous ici</a>
<div>
  <h1>User Login</h1>
  <?php
  if ($this->loginError) {
  ?>
  <p>Veuillez remplir tous les champs pour vous connecter</p>
  <?php
  }
  else if ($this->nameError) {
  ?>
  <p>Le nom n'est pas valide</p>
  <?php
  }
  else if ($this->passwordError) {
  ?>
  <p>Le mot de passe n'est pas valide</p>
  <?php
  }
  ?>
  <form method="post">
    <label for="name">Nom : </label>
    <input type="text" name="name" id="name"><br>
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password"><br>
    <button type="submit">Connexion</button>
  </form>
</div>
