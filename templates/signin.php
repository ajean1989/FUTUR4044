<?php

// Affiche le formulaire d'inscription 

$title = 'Inscription :: FUTUR :: 4044';

ob_start(); 


if(isset($_SESSION['error']))
{
    echo '<div class="main__bann">';
    echo $_SESSION['error'];
    echo '</div>';
    unset($_SESSION['error']);
}



?>


<form method="post" action="<?php $controlsDirectory . 'signin.php' ?>">
    <p>
        <label for="name">prénom</label> : <input type="text" name="name" id="name" required autofocus/>
    </p>
    <p>
        <label for="last_name">Nom</label> : <input type="text" name="last_name" id="last_name" required/>
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
        <input class="btn--form" type="submit"/>
    </p>
</form>

<?php
$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';

?>