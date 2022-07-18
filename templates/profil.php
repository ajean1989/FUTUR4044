<?php

$name = strtoupper($_SESSION['name']);

$title = $name . ' :: FUTUR :: 4044';



ob_start(); 

echo 
'<p>
    <ul>
        <li> Prénom : ' .$_SESSION['name'] . '</li>
        <li> Nom : ' . $_SESSION['last_name'] . '</li>
        <li> Date de naissance : ' . $_SESSION['birth'] . '</li>
        <li> Adresse mail : ' . $_SESSION['mail'] . '</li>
    </ul>
</p>';


$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';