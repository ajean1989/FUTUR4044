<?php

// Affiche la banière

// Affiche un bouton de connection, d'enregistrement ou affiche le nom si log.



echo '
<div class="animation_header">
    <div class="animation_header__center1">
        <div class="animation_header__center1--laser1">
        </div>
    </div>
    <div class="animation_header__center2">
        <div class="animation_header__center2--laser2">
        </div>
    </div>
    <div class="animation_header__center3">
        <div class="animation_header__center3--laser3">
        </div>
    </div>
    <div class="animation_header__center4">
        <div class="animation_header__center4--laser4">
        </div>
    </div>
    <div class="animation_header__center5">
        <div class="animation_header__center5--laser5">
        </div>
    </div>
    <div class="animation_header__center6">
        <div class="animation_header__center6--laser6">
        </div>
    </div>
    <div class="animation_header__center7">
        <div class="animation_header__center7--laser7">
        </div>
    </div>
    <div class="animation_header__center8">
        <div class="animation_header__center8--laser8">
        </div>
    </div>
    <div class="animation_header__center9">
        <div class="animation_header__center9--laser9">
        </div>
    </div>
    <div class="animation_header__center10">
        <div class="animation_header__center10--laser10">
        </div>
    </div>
</div>';

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
            <li class=btn--nav><a href="/nouvel_article">Nouvel article</a></li>
        </ul>';
}
else
{
    echo '<ul>
            <li class=btn--nav><a href="/connexion">Connexion</a></li>
            <li class=btn--nav><a href="/inscription">Inscription</a></li>
        </ul>';
}

