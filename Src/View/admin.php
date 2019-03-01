<div>
  <h1>Blog Admin</h1>
  <div>
    <p>Bonjour <strong><?= $_SESSION['name']; ?></strong></p>
    <a href="../user/logout">Se déconnecter</a>
  </div>
  <h2>Que désirez vous faire ?</h2>
  <a href="create">Créer un chapitre</a><br>
  <a href="update">Éditer un chapitre</a><br>
  <a href="delete">Supprimer un chapitre</a><br>
  <a href="comments">Consulter les commentaires signalés</a><br>
</div>
