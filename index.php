<?php

// Nouvelle session
session_start();

// Autoloader
spl_autoload_register(function($class) {
  $class = str_replace('\\', '/', $class) . '.php';
  require $class;
});

$postsController = new Controllers\PostsController();
$postsController->getHomePage();
