<?php

/*

                    * Le formulairevient d'être envoyé :
Oui : model / envoie vers l'article     Non : On affiche le formulaire


*/

if(isset($_POST['title']))
{

    require_once $modelsDirectory . 'new_post.php';

    //Test::var_dump($AddPost->LastPost->id);

    header("location: /?id=" . $AddPost->LastPost->id);

}
elseif(isset($_SESSION['error']))
{

    require_once $templatesDirectory . 'new_post.php';

}
else
{

    require_once $templatesDirectory . 'new_post.php';

}