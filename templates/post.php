<?php

$title = $Post->title . ' :: FUTUR :: 4044';


// Message Erreur si le postId n'existe pas



ob_start(); 



echo 
'<h1>' . $Post->title . '</h1>' . 

'<img src="/images/posts/' . $Post->img . '" alt="images de couverture"/>' .
    
'<p>' . $Post->content . '</p>';


$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';