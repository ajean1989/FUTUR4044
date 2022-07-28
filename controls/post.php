<?php

declare(strict_types=1);



require_once $modelsDirectory . 'post.php';



$Post->imgTreatment();
$Post->hyperlinkInPost();
$Post->titleInPost();
$Post->emInPost();
$Post->intro();
$Post->nl2brContent();


require_once $templatesDirectory . 'post.php';


