<?php

// Nouvelle session
session_start();

// Autoloader
spl_autoload_register(function($class) {
  $class = '../' . str_replace('\\', '/', $class) . '.php';
  require $class;
});

// Initialisation du Controller
$controller = new Src\Controller\Blog();

// Router
if (isset($_GET['chapitre'])) {
  $controller->chapter($_GET['chapitre']);
}

else {
  $controller->home();
}

// URL rewriting htaccess.
// Class dispatch dans dossier app
// index.php/[nom controller a appeler]/[nom de la methode]
// index.php
// index.php?chapitre=1
// index.php/inscription
// index.php/connect
// index.php/disconnect
// index.php/profil
// index.php/profil/articles
// index.php/profil/newarticle
// /posts : affiche tous les posts
// /posts?id=1 : recupere et affiche un post par son
// /posts/create : creer un posts
// /posts/delete?id=1 : efface un post
// /posts/update?id=1 : modifie un post
// /users
// /users/create
