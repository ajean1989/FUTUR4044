<?php

$title = $Post->title . ' :: FUTUR :: 4044';


// Message Erreur si le postId n'existe pas



ob_start(); 



echo 
'<div class="post">
<h1>' . $Post->title . '</h1>' . 

'<img src="/images/posts/' . $Post->id .'/' . $Post->img . '" alt="images de couverture"/>' .
    
'<p>' . $Post->content . '</p>';

if($_SESSION['admin']===1)
{
    echo '<a href="/modifyPost/?id=' . $Post->id . '">Modifier l\'article</a><br/>
    <a classe="btn--form" href= "/deletePost"> Delete </a>';
           
}
echo '</div>';

$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';