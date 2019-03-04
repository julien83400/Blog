<div>
  <a href="admin">Retour à l'interface d'administration</a>
  <h1>Liste des commentaires signalés</h1>
  <?php
  foreach($this->reportedComments as $reportedComment) {
  ?>
    <p><?= $reportedComment->getDate(); ?> <strong><?= $reportedComment->getName(); ?></strong> a commenté :<p>
    <p>"<?= $reportedComment->getComment(); ?>"</p>
    <form method="post">
      <button type="submit" name="delete" value=<?= $reportedComment->getId(); ?>>Supprimer ce commentaire</button>
    </form>
  <?php
  }
  ?>
</div>
