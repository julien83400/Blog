<?php
if ($this->chapterId !== null) {
?>
  <div>
    <a href="../update">Retour à la liste des chapitres</a>
    <h1>Édition du chapitre</h1>
    <form method="post">
      <label for="title">Titre du chapitre : </label>
      <input type="text" name="title" id="title" value="<?= $this->post->getTitle(); ?>"><br>
      <label for="content">Contenu : </label><br>
      <textarea name="content" id="content" rows="20" cols="80"><?= $this->post->getContent(); ?></textarea><br>
      <button type="submit">Mettre à jour</button>
    </form>
    <?php
    if ($this->postUpdated) {
    ?>
    <p>Le Chapitre a bien été mis à jour</p>
    <?php
    }
    ?>
  </div>
<?php
}
else {
?>
  <div>
    <a href="admin">Retour à l'interface d'administration</a>
    <h1>Liste des chapitres</h1>
    <?php
    foreach($this->posts as $post) {
    ?>
      <h2><?= $post->getTitle(); ?></h2>
      <a href="update/<?= $post->getId() ?>">Éditer le chapitre</a>
    <?php
    }
    ?>
  </div>
<?php
}
?>
