<div>
  <a href="http://localhost:8888/Project/">Retour à la page d'accueil</a>
  <h1>Billet simple pour l'Alaska</h1>
  <h2><?= $this->post->getTitle(); ?></h2>
  <p><?= $this->post->getContent(); ?></p>
  <h2>Commentaires</h2>
  <?php
  foreach($this->comments as $comment) {
  ?>
    <p><?= $comment->getDate(); ?> <strong><?= $comment->getName(); ?></strong> a commenté :<p>
    <p>"<?= $comment->getComment(); ?>"</p>
    <?php
    if ($comment->getReport() === '1') {
    ?>
      <p>Ce commentaire a été signalé</p>
    <?php
    } else {
    ?>
      <form method="post">
        <button type="submit" name="report_id" value=<?= $comment->getId(); ?>>Signaler</button>
      </form>
    <?php
    }
  }
  ?>
  <h2>Ajouter un commentaire</h2>
  <?php
  if ($this->addCommentError === true) {
  ?>
    <p>Veuillez remplir tous les champs pour ajouter un commentaire</p>
  <?php   
  }
  ?>
  <form method="post">
    <label for="name">Votre nom : </label><input type="text" name="name" id="name"><br>
    <label for="comment">Votre commentaire : </label><br>
    <textarea name="comment" id="comment" rows="8" cols="80"></textarea><br>
    <button type="submit">Publier</button>
  </form>
</div>
