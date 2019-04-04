<section class="section-wrapper">
  <?php
  foreach($this->data['posts'] as $post) {
  ?>
  <div class="home-chapter-container">
    <div class="home-chapter-heading">
      <h2><?= $post->getTitle(); ?></h2>
      <p class="home-chapter-date">Publié <?= $post->getDate(); ?></p>
    </div>
    <p class="home-chapter-content"><?= $post->getContent(); ?></p>
    <a class="home-chapter-link" href="blog/chapter/<?= $post->getId() ?>">Voir le chapitre en entier</a>
  </div>
  <?php
  }
  ?>
</section>
