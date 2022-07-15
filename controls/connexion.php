<?php

/* 

* Est ce que tu viens de remplir le formulaire ? 

    Oui : contrôle                                       Non : Est ce que tu es déjà connecté ? 
       ...                                       Oui : Vers profil       Non : Affiche le formulaire

    Ok : Vers Accueil    Nok : Vers formulaire + message d'erreur
        set $_SESSION



    Contrôle :  
    1 . model : liste des users (mail, password)
    2 . Comparer les infos entrées avec la liste du model


*/


declare(strict_types=1);


// déclaration variables, Class





// Algo header
echo $_POST['mail'];


if (isset($_POST['mail']))
{
    require_once $modelsDirectory . 'connexion.php';

    print_r($Db->users);


    foreach($Db->users as $user)
    {
        if($user->mail === $_POST['mail'] && $user->password === SHA1($_POST['password']))
        {
            
            $_SESSION['mail'] = $User->mail;
            $_SESSION['name'] = $user->name;
            header("location: /");
        }
        else
        {
            echo 'erreur dans la combinaison';
        }
    } 

}
else
{
    if(isset($_SESSION['mail']))
    {
        echo 'Déjà connecté. Vers profil';
    }
    else
    {
        require_once $templatesDirectory . 'connexion.php';
    }
}