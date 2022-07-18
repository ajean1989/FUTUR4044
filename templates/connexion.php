<?php

$title = 'Connexion :: FUTUR :: 4044';

ob_start(); 

if(isset($_SESSION['erreur']))
{
    echo '<div class="main__bann">' . $_SESSION['erreur'] . '</div>';
    unset($_SESSION['erreur']);
}

?>

<form method="post" action="<?php $controlsDirectory . ' connexion.php'?>">
    <p>
        <label for="mail">e-mail</label> : <input type="mail" name="mail" id="mail"/>
        <label for="password">mot de passe</label> : <input type="password" name="password" id="password"/>
    </p>
    <p>
        <input class="btn--form" type="submit"/>
    </p>
</form>

<?php

$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');



