<div>
  <h1>Admin Inscription</h1>
  <?php
  if ($this->registerError === true) {
  ?>
  <p>Veuillez remplir tous les champs pour vous inscrire</p>
  <?php
  }
  else if ($this->passwordError === true) {
  ?>
  <p>Les mots de passe ne correspondent pas</p>
  <?php
  }
  ?>
  <form method="post">
    <label for="name">Nom : </label>
    <input type="text" name="name" id="name"><br>
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password"><br>
    <label for="password-confirm">Confirmez le mot de passe : </label>
    <input type="password" name="password-confirm" id="password-confirm"><br>
    <button type="submit">Inscription</button>
  </form>
</div>
