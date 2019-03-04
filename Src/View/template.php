<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>
  tinymce.init({
    selector: '.chapter',
    menubar: false,
    toolbar: false
  });
  </script>
  </head>
  <body>
    <?= $this->content; ?>
  </body>
</html>
