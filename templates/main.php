<?php

// Affiche le contenue de la page d'accueil 

// Class PageInfo : $title $user(db user)

// Contenu à afficher 

    

// Appeler le layout html

$title = ':: FUTUR :: 4044 ::';

ob_start();


if(isset($_SESSION['name']))
{
    if($_SESSION['valid'] = 1)
    {
        echo 'Enregistrement réussi <br/>';
        $_SESSION['valid'] = 0;
    }
    echo 'Hello ' . $_SESSION['name'] . '<br/>' . $_SESSION['mail'];
}
else
{
    echo 'Hello inconnu <br/>';
}

foreach($Db->posts as $post)
{
    echo '<a href="/?id=' . $post->id . '">' . $post->title . '<br/>' . $post->content . '</a><br/>';
}


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');

