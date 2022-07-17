<?php

// Affiche le formulaire d'inscription 

$title = 'Inscription :: FUTUR :: 4044';

ob_start(); ?>


<form method="post" action="<?php $controlsDirectory . 'signin.php' ?>">
    <p>
        <label for="name">prénom</label> : <input type="text" name="name" id="name" required autofocus/>
    </p>
    <p>
        <label for="lastname">Nom</label> : <input type="text" name="lastname" id="lastname" required/>
    </p>
    <p>
        <label for="mail">Mail</label> : <input type="email" name="mail" id="mail" required/>
    </p>
    <p>
        <label for="birth">Date de naissance</label> : <input type="date" name="birth" id="birth" required/>
    </p>
    <p>
        <label for="password">Mot de passe</label> : <input type="password" name="password" id="password" required/>
    </p>
    <p>
        <input type="submit"/>
    </p>
</form>

<?php
$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';

?>




