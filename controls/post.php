<?php

declare(strict_types=1);



require_once $modelsDirectory . 'post.php';

if($Post->public_share === 0 && $_SESSION['admin'] === 0)
{
    $_SESSION['error'] = 'l\'article n\'est pas public';
    header('location: /');
    exit;
}
else
{
    $Post->imgTreatment();
    $Post->hyperlinkInPost();
    $Post->titleInPost();
    $Post->pInPost();
    $Post->emInPost();
    $Post->intro();
    $Post->nl2brContent();

    $creationDate = new DateTime($Post->creationDate);
    $creationDate = $creationDate->format('d/m/Y');

    $modificationDate = new DateTime($Post->modificationDate);
    $modificationDate = $modificationDate->format('d/m/Y');

    


    require_once $templatesDirectory . 'post.php';
}


