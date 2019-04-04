<section  class="chapter-comments-wrapper box">
  <a class="logout" href="admin">Retour à l'interface d'administration</a>
  <h1 class="admin-heading">Liste des chapitres</h1>
  <?php
  foreach($this->data['posts'] as $post) {
  ?>
    <h2><?= $post->getTitle(); ?></h2>
    <p class="delete-p"><?= $post->getContent(); ?></p>
    <form class="delete-form" method="post">
      <button type="submit" class="form-button" name="delete" value=<?= $post->getId(); ?>>Supprimer le chapitre</button>
    </form>
  <?php
  }
  if ($this->confirm['postDeleted']) {
  ?>
  <p>Le chapitre a bien été supprimé</p>
  <?php
  }
  ?>
</section>
