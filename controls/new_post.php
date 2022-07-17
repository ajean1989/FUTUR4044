<?php

/*

                    * Le formulairevient d'être envoyé :
Oui : model / envoie vers l'article     Non : On affiche le formulaire


*/

if(isset($_POST['title']))
{
    require_once $modelsDirectory . 'new_post.php';

    $postId = $Db->posts->id;

    header("location: /?id=" . $postId);
}
else
{
    require_once $templatesDirectory . 'new_post.php';
}