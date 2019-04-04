<?php
if ($this->data['chapterId'] !== null) {
?>
  <section class="chapter-comments-wrapper box">
    <a class="logout" href="../update">Retour à la liste des chapitres</a>
    <h1 class="admin-heading">Édition du chapitre</h1>
    <form method="post">
      <label for="title">Titre du chapitre : </label><br>
      <input type="text" class="comment-form" name="title" id="title" value="<?= $this->data['post']->getTitle(); ?>"><br>
      <label for="content">Contenu du chapitre : </label>
      <textarea class="chapter" name="content" id="content"><?= $this->data['post']->getContent(); ?></textarea>
      <button class="btn" type="submit">Mettre à jour</button>
    </form>
    <?php
    if ($this->confirm['postUpdated']) {
    ?>
    <p>Le Chapitre a bien été mis à jour</p>
    <?php
    }
    ?>
  </section>
<?php
}
else {
?>
  <section class="chapter-comments-wrapper box">
    <a class="logout" href="admin">Retour à l'interface d'administration</a>
    <h1 class="admin-heading">Liste des chapitres</h1>
    <?php
    foreach($this->data['posts'] as $post) {
    ?>
      <h2><?= $post->getTitle(); ?></h2>
      <a class="admin-btn" href="update/<?= $post->getId() ?>">Éditer le chapitre</a>
    <?php
    }
    ?>
  </section>
<?php
}
?>
