<?php 

declare(strict_types=1);



if(isset($_SESSION['mail']))
{
    if(isset($_POST['password']))
    {
        

        require_once $modelsDirectory . 'modifyPassword.php';

        if($password->password !== SHA1($_POST['password']))
        {
            $_SESSION['error'] = ':: L\'ancien mot de passe n\'est pas correcte ::';
            header('location: /password');
        }
        else
        {

        $_SESSION['error'] = ':: Nouveau mot de passe pris en compte ::';
        require_once $templatesDirectory . 'profil.php';

        }
    }
    else
    {
        require_once $templatesDirectory . 'modifyPassword.php';
    }
}
else
{
    $_SESSION['error'] = 'Accès non autorisé à cette section';
    header('location: /');
}
