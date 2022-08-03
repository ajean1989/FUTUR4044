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


declare(strict_types=1);

session_start();



// Chargement des varibles

require_once './../src/var.php';



// Chargement des Class 

require_once $classDirectory . 'test.php';

require_once $classDirectory . 'db.php';
require_once $classDirectory . 'safety.php';
require_once $classDirectory . 'inputs.php';
require_once $classDirectory . 'posts_inputs.php';
require_once $classDirectory . 'posts_safety.php';
require_once $classDirectory . 'posts_controls.php';
require_once $classDirectory . 'CRUDPost.php';
require_once $classDirectory . 'posts.php';
require_once $classDirectory . 'users_inputs.php';
require_once $classDirectory . 'users_safety.php';
require_once $classDirectory . 'users_controls.php';
require_once $classDirectory . 'CRUDUser.php';
require_once $classDirectory . 'users.php';
require_once $classDirectory . 'category.php';
require_once $classDirectory . 'images.php';




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
    case '/disconnect' :
        require_once $controlsDirectory.'disconnect.php';
        break;
    case '/inscription' :
        require_once $controlsDirectory.'signin.php';
        break;
    case '/profil' :
        require_once $controlsDirectory.'profil.php';
        break;
    case '/nouvel_article' :
        require_once $controlsDirectory.'new_post.php';
        break;
    case '/?theme=' . $categoryUrl :
        require_once $controlsDirectory.'category.php';
        break;
    case '/?id=' . $postId :
            require_once $controlsDirectory . 'post.php';
        break;  
    case '/modifyPost/?id=' . $postId :
         require_once $controlsDirectory . 'modifyPost.php';
    break; 
    case '/mprofil' :
        require_once $controlsDirectory . 'modifyProfil.php';
    break;   
    case '/password' :
        require_once $controlsDirectory . 'modifyPassword.php';
    break;    
    case '/deleteUser' :
        require_once $controlsDirectory . 'deleteUser.php';
    break;  
    case '/deletePost' :
        require_once $controlsDirectory . 'deletePost.php';
    break; 
    case '/sharePost' :
        require_once $controlsDirectory . 'sharePost.php';
    break; 

    default : 
    echo 'Erreur 404 : page non trouvée sur l\'internet 🤓';
        
    
}

//tests

/*



*/






?>