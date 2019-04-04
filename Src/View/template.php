<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Billet simple pour l'Alaska</title>
    <link rel="stylesheet" href="/css/master.css">
    <style type="text/css"><?php include('../public/css/style.css'); ?></style>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=z7o76ei8xi029ecusyr42bigz4luc7q3lduompef6glr02av"></script>
    <script>
  tinymce.init({
    selector: '.chapter',
    height: 600
  });
  </script>
  </head>
  <body>
    <?php
      if ($this->navbar) {
      ?>
      <header>
        <nav>
          <div>
            <p>BILLET SIMPLE POUR L'ALASKA</p>
            <a href="http://localhost:8888/Project/user/login">Administration</a>
          </div>
        </nav>
      </header>
      <?php
      }
    ?>
    <?= $this->content; ?>
  </body>
</html>
