<?php 

/*

Se connecte à la db pour afficher les articles

    Appelle du model connection / posts / categories


Traite les données à afficher, à savoir :
    - Les catégories dans nav bar (Class Category)
    - La catégorie sélectionner si il y en a une (Category.select())
    - Sort la liste de tous les articles (ou liste des articles de la catégorie sélectionnée) classés par ordre chronologique inversé (Class Posts)
    - affiche tous les articles (puis afficher 10 articles + infinit scroll avec JS)


 Appeler la vue main.php

*/


//déclaration variables et objets


declare(strict_types=1);

$user = new Users;
$posts = new Posts;


// On appelle les models

require_once $modelsDirectory . '/connexion.php';

require_once $modelsDirectory . '/users.php'; 

require_once $modelsDirectory . '/posts.php'; 

dbConnexion();

getUser('*');

getPosts('*');



//On traite les données

echo '<br/> -------------------<br/><pre>';
print_r($user); 

echo '<br/> -------------------<br/>';
print_r($posts); 

echo '</pre><br/>  ---------------- <br/>';

echo $templatesDirectory . 'main.php';

require_once($templatesDirectory . 'main.php');

