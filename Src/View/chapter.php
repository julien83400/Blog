<div>
  <a href="index.php">Retour à la page d'accueil</a>
  <h1>Comment cacher un playmobile dans son anus ?</h1>
  <h2><?= $post->title; ?></h2>
  <p><?= $post->content; ?></p>
  <h2>Commentaires</h2>
  <?php
  foreach($comments as $comment) {
  ?>
    <p><?= $comment->date; ?> <strong><?= $comment->name; ?></strong> a commenté :<p>
    <p>"<?= $comment->comment; ?>"</p>
    <?php
    if ($comment->report == 1) { ?>
      <p>Ce commentaire a été signalé</p>
    <?php
    } else { ?>
    <form action="index.php?chapitre=<?= $post->id ?>" method="post">
      <button type="submit" name="report_id" value=<?= $comment->id; ?>>Signaler</button>
    </form>
    <?php
    }
  }
  ?>
  <h2>Ajouter un commentaire</h2>
  <form action="index.php?chapitre=<?= $post->id ?>" method="post">
    <label for="name">Votre nom : </label><input type="text" name="name" id="name"><br>
    <label for="comment">Votre commentaire : </label><br>
    <textarea name="comment" id="comment" rows="8" cols="80"></textarea><br>
    <button type="submit" name="button">Publier</button>
  </form>
</div>
