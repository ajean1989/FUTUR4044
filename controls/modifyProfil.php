<?php 

declare(strict_types=1);



if(isset($_SESSION['mail']))
{
    if(isset($_POST['mail']))
    {
        

        require_once $modelsDirectory . 'modifyProfil.php';

        $_SESSION['name'] = $AddUser->inputName;
        $_SESSION['last_name'] = $AddUser->inputLastName;
        $_SESSION['mail'] = $AddUser->inputMail;
        $_SESSION['birth'] = $AddUser->inputBirth;


        header("location: /Profil");
    }
    else
    {
        require_once $templatesDirectory . 'modifyProfil.php';
    }
}
else
{
    $_SESSION['error'] = 'Accès non autorisé à cette section';
    header('location: /');
}
