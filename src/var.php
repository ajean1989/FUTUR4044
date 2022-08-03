<?php 

// Variables de gestion des dossiers

$rootDir = dirname(__DIR__);

$controlsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'controls' . DIRECTORY_SEPARATOR ;
$modelsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR ;
$templatesDirectory = $rootDir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR ;
$layoutsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR ;
$classDirectory = $rootDir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Class' . DIRECTORY_SEPARATOR ;
$imagesDirectory = $rootDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR ;



// Variable séléction de l'article

if(isset($_GET['id']))
{
    $postId = (int) $_GET['id']; 
    $_SESSION['postId'] = $postId;
}
else
{
    $postId = (int) 0; 
}


if(isset($_GET['theme']))
{
    $categoryUrl = urlencode($_GET['theme']);
    $category = $_GET['theme']; //$_GET est décodé automatiquement
}
else
{
    $category = '';
    $categoryUrl = '';
}
