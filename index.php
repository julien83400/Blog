<?php

// Nouvelle session
session_start();

// Autoloader
spl_autoload_register(function($class) {
  $class = str_replace('\\', '/', $class) . '.php';
  require $class;
});

// Initialisation du Controller
$postsController = new Controllers\PostsController();

if (isset($_GET['chapitre'])) {
  $chapterId = $_GET['chapitre'];
  $postsController->getChapter($chapterId);
}

else {
  $postsController->getHomePage();
}
