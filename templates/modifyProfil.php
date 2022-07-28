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


<form method="post" action="<?php $controlsDirectory . 'modifyProfil.php' ?>">

        <label for="name">prénom</label> : <input type="text" name="name" id="name" value="<?= $_SESSION['name'] ?>" required autofocus/>

        <label for="last_name">Nom</label> : <input type="text" name="last_name" id="last_name" value="<?= $_SESSION['last_name'] ?>"required/>

        <label for="mail">Mail</label> : <input type="email" name="mail" id="mail" value="<?= $_SESSION['mail'] ?>"required/>

        <label for="birth">Date de naissance</label> : <input type="date" name="birth" id="birth" value="<?= $_SESSION['birth'] ?>"required/>

        <input class="btn--form" type="submit"/>
</form>

<?php
$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';

?>