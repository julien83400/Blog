<div>
  <h1>Billet simple pour l'Alaska</h1>
  <?php
  foreach($posts as $post) {
  ?>
    <h2><?= $post->getTitle(); ?></h2>
    <p><strong>Publié <?= $post->getDate(); ?></strong></p>
    <p><?= $post->getContent(); ?></p>
    <a href="index.php?chapitre=<?= $post->getId(); ?>">Voir le chapitre en entier</a>
  <?php
  }
  ?>
</div>
