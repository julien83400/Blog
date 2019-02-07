<div>
  <h1>Billet simple pour l'Alaska</h1>
  <?php
  foreach($posts as $post) {
  ?>
    <h2><?= $post->title; ?></h2>
    <p><strong>Publié le <?= $post->date; ?></strong></p>
    <p><?= $post->content; ?></p>
    <a href="index.php?chapitre=<?= $post->id ?>">Voir le chapitre en entier</a>
  <?php
  }
  ?>
</div>
