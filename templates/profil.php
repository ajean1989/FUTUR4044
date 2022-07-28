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
        <li><a href = "/mprofil">Modifier le profil</a></li>
        <li><a href = "/password">Modifier le mot de passe</a></li>
    </ul>
</p>';


$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';