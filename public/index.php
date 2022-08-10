<?php

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
    case '/Connexion' :
        require_once $controlsDirectory.'connexion.php';
        break;
    case '/Disconnect' :
        require_once $controlsDirectory.'disconnect.php';
        break;
    case '/Inscription' :
        require_once $controlsDirectory.'signin.php';
        break;
    case '/Profil' :
        require_once $controlsDirectory.'profil.php';
        break;
    case '/Nouvel_article' :
        require_once $controlsDirectory.'new_post.php';
        break;
    case '/?theme=' . $categoryUrl :
        require_once $controlsDirectory.'category.php';
        break;
    case '/?id=' . $postId :
            require_once $controlsDirectory . 'post.php';
        break;  
    case '/ModifyPost/?id=' . $postId :
         require_once $controlsDirectory . 'modifyPost.php';
    break; 
    case '/Mprofil' :
        require_once $controlsDirectory . 'modifyProfil.php';
        break;   
    case '/Password' :
        require_once $controlsDirectory . 'modifyPassword.php';
        break;    
    case '/DeleteUser' :
        require_once $controlsDirectory . 'deleteUser.php';
        break;  
    case '/DeletePost' :
        require_once $controlsDirectory . 'deletePost.php';
        break; 
    case '/SharePost' :
        require_once $controlsDirectory . 'sharePost.php';
        break; 

    default : 
    echo 'Erreur 404 : page non trouvée sur l\'internet 🤓';    
}

?>