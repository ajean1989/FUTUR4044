<?php

/* 

* Config  des variables de gestion des dossiers (pour que les require soient tous ok peut importe la config)

* Charge les controlers

* Contrôle l'url demandé pour lancer la fonction (controler) associée

    Pages / url :
        main / '' : Class PageInfo et Users gère les log 
        sign in / connexion
        sign up / inscription
        profil / profil
        disconnect /
        catégory=# / $category
        article=# / #idArticle


*/






// Variables de gestion des dossiers


declare(strict_types=1);


session_start();


$rootDir = dirname(__DIR__);

$controlsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'controls' . DIRECTORY_SEPARATOR ;
$modelsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR ;
$templatesDirectory = $rootDir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR ;
$layoutsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR ;
$classDirectory = $rootDir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Class' . DIRECTORY_SEPARATOR ;
$imagesDirectory = $rootDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR ;



// Chargement des Class 


require_once $classDirectory . 'db.php';
require_once $classDirectory . 'users.php';
require_once $classDirectory . 'posts.php';



//Contrôle de l'url et chargement des controlers


$uri = $_SERVER['REQUEST_URI']; // $var = (condition) ? true : false


switch($uri)
{
    case '/' :
        require_once $controlsDirectory.'main.php';
        break;
    case '/connexion' :
        require_once $controlsDirectory.'connexion.php';
        break;
    case 'inscription' :
        // control;
        break;
    case 'profil' :
        require_once $controlsDirectory.'profil.php';
        break;
    /*case $category :
        // control;
        break;
    case $post :
            // control;
        break;    */

    default : 
    echo 'Erreur 404 : page non trouvée sur l\'internet 🤓';
        

}

//tests

/*



*/






?>