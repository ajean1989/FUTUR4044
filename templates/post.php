<?php

$title = $post->title . ':: FUTUR :: 4044';



ob_start(); 

echo $post->title . '<br/>'  . $post->content;

$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';