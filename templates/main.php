<?php

// Class PageInfo : $title $user(db user)

// Contenu à afficher 

// Appeler le layout html

echo '<br/>***************<br/>' . $layoutsDirectory ;

ob_start();

echo 'test : liste des articles';

$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');

