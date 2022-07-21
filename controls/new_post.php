<?php

/*

                    * Le formulairevient d'être envoyé :
Oui : model / envoie vers l'article     Non : On affiche le formulaire


*/

if(isset($_POST['title']))
{
    require_once $modelsDirectory . 'new_post.php';

    $postId = $Posts->posts->id;

    header("location: /?id=" . $postId);
}
elseif(isset($_SESSION['error']))
{
    
    echo 'hey';
    require_once $templatesDirectory . 'new_post.php';
    
}
else
{
    echo 'coucou';
    require_once $templatesDirectory . 'new_post.php';
}