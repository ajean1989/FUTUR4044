<?php

/*

* Le formulaire vient d'être rempli ? 

* Oui : Mise en base / Redirection main                         * Non : Est ce que tu es déjà connecté ?
    enregistrement des variables $_SESSION                   Oui : Go profil       Non : view page signup
    Retour au main avec banière JS 'enregistrement réussi"
        commandée par $_SESSION['valid']
*/
declare(strict_types=1);


if(isset($_POST['mail']))
{

    require_once $modelsDirectory . 'signin.php';

    $_SESSION['name'] = $Users->inputName;
    $_SESSION['last_name'] = $Users->inputLastName;
    $_SESSION['mail'] = $Users->inputMail;
    $_SESSION['birth'] = $Users->inputBirth;
    $_SESSION['admin'] = 0;
    $_SESSION['valid'] = 1;     

    require_once $controlsDirectory . 'main.php';
    

}
elseif(isset($_SESSION['error']))       //Affiche les erreurs
{
    require_once $templatesDirectory . 'signin.php';
}
else
{

    if(isset($_SESSION['name']))
    {
        require_once $controlsDirectory . 'profil.php';
    }
    else
    {
        require_once $templatesDirectory . 'signin.php';
    }
}