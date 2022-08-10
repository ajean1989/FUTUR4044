<?php

$name = strtoupper($_SESSION['name']);

$title = $name . ' :: FUTUR :: 4044';

$birth = new DateTime($_SESSION['birth']);
$birth->format('d/M/y');



ob_start(); 



if(isset($_SESSION['error']))
{
    echo '<div class="main__bann">';
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    echo '</div>';
}


echo 
'<p>
    <ul>
        <li>Prénom : ' .$_SESSION['name'] . '</li>
        <li>Nom : ' . $_SESSION['last_name'] . '</li>
        <li>Date de naissance : ' . $birth->format('d/M/y') . '</li>
        <li>Adresse mail : ' . $_SESSION['mail'] . '</li>
        <li><a href = "/Mprofil">Modifier le profil</a></li>
        <li><a href = "/Password">Modifier le mot de passe</a></li>
    </ul>
</p>';

?>
<!--
<form method="post" action="<?php $controlsDirectory . 'signin.php' ?>">
        <input class="btn--form" type="submit"/>
</form>
-->

<a classe="btn--form" href= "/DeleteUser"> Delete </a>




<?php

//Test::var_dump($controlsDirectory);

$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';

?>