<?php

$title = $post->title . ':: FUTUR :: 4044';



ob_start(); 

echo 
'<h1>' . $post->title . '</h1>' . 
    
'<p>' . $post->content . '</p>';

$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';