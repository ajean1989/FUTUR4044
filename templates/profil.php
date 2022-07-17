<?php

$title = $Db->users->name . ':: FUTUR :: 4044';



ob_start(); 

echo $_SESSION['last_name'] . '<br/>'  . $_SESSION['name'] . '<br/>' . $_SESSION['mail'] . '<br/>' . $_SESSION['birth'];

$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';