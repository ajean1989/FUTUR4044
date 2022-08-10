<?php

/*

                    * La connexion est établie ? 
Oui : Affiche les infos de la class User    *Non : lien vers login
        au travers de la view
*/

if(isset($_SESSION['name']))
{
    require_once $templatesDirectory . 'profil.php';
}
else
{
    header("location: /Connexion");
}