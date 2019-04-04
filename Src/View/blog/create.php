<section class="chapter-comments-wrapper box">
  <a class="logout" href="admin">Retour à l'interface d'administration</a>
  <h1 class="admin-heading">Nouveau chapitre</h1>
    <form method="post">
      <label for="title">Titre du chapitre : </label><br>
      <input type="text" class="comment-form" name="title" id="title" value=""><br>
      <label for="content">Contenu du chapitre : </label>
      <textarea class="chapter comment-date" name="content" id="content"></textarea>
      <button class="btn" type="submit">Créer le chapitre</button>
    </form>
  <?php
  if ($this->confirm['postCreated']) {
  ?>
    <p>Le chapitre a bien été créé</p>
  <?php
  }
  if ($this->error['postCreate']) {
  ?>
    <p>Veuillez remplir tous les champs pour créer le chapitre</p>
  <?php
  }
  ?>
</section>
