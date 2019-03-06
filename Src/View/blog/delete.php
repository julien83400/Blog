<div>
  <a href="admin">Retour à l'interface d'administration</a>
  <h1>Liste des chapitres</h1>
  <?php
  foreach($this->posts as $post) {
  ?>
    <h2><?= $post->getTitle(); ?></h2>
    <p><?= $post->getContent(); ?></p>
    <form method="post">
      <button type="submit" name="delete" value=<?= $post->getId(); ?>>Supprimer le chapitre</button>
    </form>
  <?php
  }
  if ($this->postDeleted) {
  ?>
  <p>Le chapitre a bien été supprimé</p>
  <?php
  }
  ?>
</div>
