<?php

if($_SESSION['admin'] ===1)
{
    if($_SESSION['publicShare'] === 0)
    {
        $_SESSION['publicShare'] = (int) 1;
        require_once $modelsDirectory . 'sharePost.php';
    }
    if($_SESSION['publicShare'] === 1)
    {
        $_SESSION['publicShare'] = (int) 0;
        require_once $modelsDirectory . 'sharePost.php';
    }
}

require_once $controlsDirectory . 'post.php';