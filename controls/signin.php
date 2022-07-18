<?php

/*

* Le formulaire vient d'être rempli ? 

* Oui : Mise en base / Redirection main                         * Non : Est ce que tu es déjà connecté ?
    enregistrement des variables $_SESSION                   Oui : Go profil       Non : view page signup
    Retour au main avec banière JS 'enregistrement réussi"
        commandée par $_SESSION['valid']
*/

if(isset($_POST['mail']))
{

    require_once $modelsDirectory . 'signin.php';

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['birth'] = $_POST['birth'];
    $_SESSION['admin'] = 0;
    $_SESSION['valid'] = 1;     

    require_once $controlsDirectory . 'main.php';

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

