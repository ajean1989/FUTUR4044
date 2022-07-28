<?php

// Affiche le formulaire d'inscription 

$title = 'Modification du profil :: FUTUR :: 4044';

ob_start(); 


if(isset($_SESSION['error']))
{
    echo '<div class="main__bann">';
    echo $_SESSION['error'];
    echo '</div>';
    unset($_SESSION['error']);
}



?>


<form method="post" action="<?php $controlsDirectory . 'modifyPassword.php' ?>">

        <label for="password">Ancien mot de passe</label> : <input type="password" name="password" id="password" required autofocus/>

        <label for="newPassword">Nouveau mot de passe</label> : <input type="password" name="newPassword" id="newPassword" required/>

        <label for="newPasswordR">Répéter le nouveau mot de passe</label> : <input type="password" name="newPasswordR" id="newPasswordR" required/>


        <input class="btn--form" type="submit"/>
</form>

<?php
$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';

?>