<?php

// Affiche la banière

// Affiche un bouton de connection, d'enregistrement ou affiche le nom si log.

?>

<a href="/"><img src="<?= '/images/4044T.png'?>" alt="header"/></a>

<?php
if(isset($_SESSION['mail']) && $_SESSION['admin']===0)
{
    echo '<ul>
            <li class=btn--nav><a href="/profil">' . $_SESSION['name'] .'</a></li>
            <li class=btn--nav><a href="/disconnect">Déconnexion</a></li>
        </ul>';
}
elseif(isset($_SESSION['mail']) && $_SESSION['admin']===1)
{
    echo '<ul>
            <li class=btn--nav><a href="/profil">' . $_SESSION['name'] . '</a></li>
            <li class=btn--nav><a href="/disconnect">Déconnexion</a></li>
            <li class=btn--nav><a href="/Nouvel_article">Nouvel article</a></li>
        </ul>';
}
else
{
    echo '<ul>
            <li class=btn--nav><a href="/connexion">Connexion</a></li>
            <li class=btn--nav><a href="/inscription">Inscription</a></li>
        </ul>';
}
