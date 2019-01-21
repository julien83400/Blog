<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page d'acceuil du Blog</title>
  </head>
  <body>
    <div>
      <h1>Billet simple pour l'Alaska</h1>
      <?php
      foreach($datas as $post) {
      ?>
        <h2><?= $post['title']; ?></h2>
        <p><?= $post['content']; ?></p>
        <a href="index.php?chapitre=<?= $post['id']; ?>">Voir le chapitre ...</a>
      <?php
      }
      ?>
    </div>
  </body>
</html>
