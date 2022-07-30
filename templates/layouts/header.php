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

<a href="/"><img src="<?= '/images/header/4044T.png'?>" alt="header"/></a>

<?php
if(isset($_SESSION['mail']) && $_SESSION['admin']===0)
{
    echo 
'<ul>
    <a href="/profil"><li class="btn--header"><img src="./images/header/person.svg"/>' . $_SESSION['name'] .'</li></a>
    <a href="/disconnect"><li class="btn--header">Déconnexion</li></a>
</ul>';
}
elseif(isset($_SESSION['mail']) && $_SESSION['admin']===1)
{
    echo 
'<ul>
    <a href="/profil"><li class="btn--header">' . $_SESSION['name'] . '</li></a>
    <a href="/disconnect"><li class="btn--header">Déconnexion</li></a>
    <a href="/nouvel_article"><li class="btn--header">Nouvel article</li></a>
</ul>';
}
else
{
    echo 
'<ul>
    <a href="/connexion"><li class="btn--header">Connexion</li></a>
    <a href="/inscription"><li class="btn--header">Inscription</li></a>
</ul>';
}

