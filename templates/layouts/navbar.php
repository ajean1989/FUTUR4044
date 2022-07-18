<?php

// Class category 

//générer liste catégories

require_once $modelsDirectory . 'navbar.php';

echo '<ul>';

foreach($Db->category as $category)
{
    echo '<li class="btn"><a href="/?theme=' . $category['name'] . '">' . $category['name'] . '</a></li>'; //problème type de texte dans l'url pour géoplitique & transport
}

echo '</ul>';