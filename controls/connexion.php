<?php

/* 

* Est ce que tu viens de remplir le formulaire ? 

    Oui : contrôle                                       Non : Est ce que tu es déjà connecté ? 
       ...                                       Oui : Vers profil       Non : Affiche le formulaire

    Ok : Vers Accueil    Nok : Vers formulaire 
        set $_SESSION    + message d'erreur ($logerreur ici et template)



    * Contrôle :  
    1 . model : liste des users (mail, password)
    2 . Comparer les infos entrées avec la liste du model


*/


declare(strict_types=1);



// Bloque l'acces si trop de tentative 


if(isset($_SESSION['try']) && $_SESSION['try']>3)
{
    $_SESSION['error'] = ':: Trop d\'echecs Kasparov, reviens dans ... 180 minutes ::';
    require_once $controlsDirectory . 'main.php';
}






if (isset($_POST['mail']))
{

    // Initialisation des tentatives

    if(!isset($_SESSION['try']))
    {
        $_SESSION['try'] = (int) 1;
    }

    
    require_once $modelsDirectory . 'connexion.php';


    // Est ce que les inputs matches ?
    // Pas de contrôle des entrées car $_POST sera uniquement comparé et jamais affiché ou en requête

 
    foreach($listUsers as $user)
    {
        if($user->mail === $_POST['mail'] && $user->password === SHA1($_POST['password']))
        {
            $_SESSION['mail'] = $user->mail;
            $_SESSION['name'] = $user->name;
            $_SESSION['last_name'] = $user->last_name;
            $_SESSION['birth'] = $user->birth;
            $_SESSION['admin'] = $user->admin;
        }

    } 

    if(isset($_SESSION['mail']))
    {
        unset($_SESSION['try']);
        header('location: /');
        exit();
    }
    else
    {
        $_SESSION['error'] = ':: Erreur :: 4044 :: identifiants non valides :: ' . $_SESSION['try'] . '/10 tentatives';
        $_SESSION['try']++;
        header('location: /connexion');
        exit();
    }


}
else
{
    if(isset($_SESSION['mail']))
    {
        header('location: /profil');
        exit();
    }
    else
    {
        require_once $templatesDirectory . 'connexion.php';
    }
}

