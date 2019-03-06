<div>
  <a href="admin">Retour à l'interface d'administration</a>
  <h1>Nouveau chapitre</h1>
    <form method="post">
      <label for="title">Titre du chapitre : </label><br>
      <input type="text" name="title" id="title" value=""><br>
      <label for="content">Contenu du chapitre : </label>
      <textarea class="chapter" name="content" id="content"></textarea>
      <button type="submit">Créer le chapitre</button>
    </form>
  <?php
  if ($this->postCreated) {
  ?>
    <p>Le chapitre a bien été créé</p>
  <?php
  }
  if ($this->postCreateError) {
  ?>
    <p>Veuillez remplir tous les champs pour créer le chapitre</p>
  <?php
  }
  ?>
</div>
