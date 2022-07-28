<?php 

declare(strict_types=1);

if($_SESSION['admin']===1)
{
    if(isset($_POST['title']))
    {
        require_once $modelsDirectory . 'modifyPost.php';

        header("location: /?id=" . $_SESSION['postId']);;  
    }
    else
    {
        require_once $modelsDirectory . 'modifyPost.php';

        require_once $templatesDirectory . 'modifyPost.php';
    }
}
else
{
    $_SESSION['error'] = 'Accès non autorisé à cette section';
    header('location: /');
}
