<?php

// Class category 

//générer liste catégories

require_once $modelsDirectory . 'navbar.php';

echo '<pre>';
var_dump($Db->category);
echo '</pre>';

foreach($Db->category as $category)
{
    echo '<a href="/?theme=' . $category['name'] . '">' . $category['name'] . '</a><br/>'; //problème type de texte dans l'url pour géoplitique & transport
}