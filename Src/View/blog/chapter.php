<div>
  <a href="../../">Retour à la page d'accueil</a>
  <section class="section-wrapper">
    <h1 id="chapter-heading"><?= $this->post->getTitle(); ?></h1>
    <?= $this->post->getContent(); ?>
  </section>
  <section id="chapter-comments-section">
    <div class="chapter-comments-wrapper">
    <h2 class="chapter-comments-heading">Commentaires</h2>
    <?php
    foreach($this->comments as $comment) {
    ?>
    <div class="comment-container">
      <p class="comment-date"><?= $comment->getDate(); ?> <strong><?= $comment->getName(); ?></strong> a commenté :<p>
      <div class="comment-display">
        <p><strong>"<?= $comment->getComment(); ?>"</strong></p>
        <?php
        if ($comment->getReport() === '1') {
        ?>
        <p>Ce commentaire a été signalé</p>
      </div>
    </div>
      <?php
      } else {
      ?>
        <form method="post">
          <button type="submit" name="report_id" value=<?= $comment->getId(); ?>>Signaler</button>
        </form>
      </div>
    </div>
      <?php
      }
    }
    ?>
    </div>
  </section>
  <section id="add-comment-section">
    <div class="chapter-comments-wrapper">
      <h2 class="chapter-comments-heading">Ajouter un commentaire</h2>
      <?php
      if ($this->addCommentError) {
      ?>
        <p>Veuillez remplir tous les champs pour ajouter un commentaire</p>
      <?php
      }
      ?>
      <form method="post">
        <input class="comment-form" type="text" name="name" placeholder="Votre nom"><br>
        <textarea class="comment-form" name="comment" placeholder="Votre commentaire"></textarea><br>
        <button id="form-button" type="submit">Publier</button>
      </form>
    </div>
  </section>
</div>
