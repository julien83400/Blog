<section class="chapter-comments-wrapper box">
  <a class="logout" href="admin">Retour à l'interface d'administration</a>
  <h1 class="admin-heading">Liste des commentaires signalés</h1>
  <?php
  foreach($this->data['reportedComments'] as $reportedComment) {
  ?>
    <p><?= $reportedComment->getDate(); ?> <strong><?= $reportedComment->getName(); ?></strong> a commenté :<p>
    <p class="comment-p">"<?= $reportedComment->getComment(); ?>"</p>
    <form method="post">
      <button class="btn" type="submit" name="delete" value=<?= $reportedComment->getId(); ?>>Supprimer ce commentaire</button>
    </form>
  <?php
  }
  ?>
</section>
