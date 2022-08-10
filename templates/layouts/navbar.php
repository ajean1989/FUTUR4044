<?php

// Class category 

//générer liste catégories

require_once $modelsDirectory . 'navbar.php';



echo '<ul>';

foreach($listCategory as $category)
{
    $categoryUrl = urlencode($category->name);

    echo '<a href="/?theme=' . $categoryUrl . '"><li class="btn--nav">' . $category->name . '</li></a>';
    
}

/*

echo '<li class="btn"><a href="/?theme=' . $listCategory[0]->name . '">' . $listCategory[0]->name . '</a></li>';

echo '<li class="btn"><a href="/?theme=' . $listCategory[0]->name . '">' . $listCategory[0]->name . '</a></li>';

echo '<li class="btn"><a href="/?theme=' . $listCategory[0]->name . '">' . $listCategory[0]->name . '</a></li>';

echo '<li class="btn"><a href="/?theme=' . $listCategory[0]->name . '">' . $listCategory[0]->name . '</a></li>';

echo '<li class="btn"><a href="/?theme=' . $listCategory[0]->name . '">' . $listCategory[0]->name . '</a></li>';

echo '<li class="btn"><a href="/?theme=' . $listCategory[0]->name . '">' . $listCategory[0]->name . '</a></li>';

*/


echo '<li class="btn--nav"><a href="/Disconnect">Déconnexion</a></li>';

echo '</ul>';