<?php

// Nouvelle session
session_start();

// Autoloader
spl_autoload_register(function($class) {
  $class = str_replace('\\', '/', $class) . '.php';
  require $class;
});

$postsController = new Controllers\PostsController();

if (isset($_GET['chapitre'])) {
  $chapitreId = $_GET['chapitre'];
  $postsController->getChapter($chapitreId);
}

else {
  $postsController->getHomePage();
}
