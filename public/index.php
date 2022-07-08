<?php

// Charge les controlers

// Controle l'url demandé pour lancer la fonction associée




// Variables de gestion des dossiers

$rootDir = dirname(__DIR__);

echo $rootDir . '<br/>';

$controlsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'controls' . DIRECTORY_SEPARATOR ;
$modelsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR ;
$templatesDirectory = $rootDir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR ;
$layoutsDirectory = $rootDir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR ;




echo $controlsDirectory;



require_once $controlsDirectory.'main.php';







?>