<section class="chapter-comments-wrapper box">
  <a class="logout" href="../">Retour au blog</a>
  <h1 class="admin-heading">Administation du blog</h1>
  <div>
    <p>Bonjour <strong><?= $_SESSION['name']; ?></strong></p>
    <a class="logout" href="../user/logout">Se déconnecter</a>
  </div>
  <h2>Que désirez vous faire ?</h2>
  <a class="admin-btn" href="create">Créer un chapitre</a><br>
  <a class="admin-btn" href="update">Éditer un chapitre</a><br>
  <a class="admin-btn" href="delete">Supprimer un chapitre</a><br>
  <a class="admin-btn" href="comments">Consulter les commentaires signalés</a><br>
</section>
