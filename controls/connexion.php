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





echo $_POST['mail'];


if (isset($_POST['mail']))
{
    //Contrôle
    
    require_once $modelsDirectory . 'connexion.php';


    foreach($Db->users as $user)
    {
        if($user->mail === $_POST['mail'] && $user->password === SHA1($_POST['password']))
        {
            $_SESSION['mail'] = $user->mail;
            $_SESSION['name'] = $user->name;
            $_SESSION['last_name'] = $user->last_name;
            $_SESSION['birth'] = $user->birth;
            header("location: /");
        }
        else
        {
            echo 'erreur dans la combinaison';
        }
    } 

    // Fin contrôle

}
else
{
    echo $_SESSION['mail'];
    if(isset($_SESSION['mail']))
    {
        echo 'Déjà connecté. Vers profil';
    }
    else
    {
        require_once $templatesDirectory . 'connexion.php';
    }
}