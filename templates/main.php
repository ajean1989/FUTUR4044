<?php

// Affiche le contenue de la page d'accueil 

// Class PageInfo : $title $user(db user)

// Contenu à afficher 

// Appeler le layout html

$title = ':: FUTUR :: 4044 ::';

ob_start();

if(isset($_SESSION['name']))
{
    echo 'Hello ' . $_SESSION['name'] . '<br/>';
}
else
{
    echo 'Hello inconnu <br/>';
}

foreach($Db->posts as $post)
{
    echo $post->title . '<br/>' . $post->content . '<br/>';
}


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');

