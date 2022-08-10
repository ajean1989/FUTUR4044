<?php

$title = $Post->title . ' :: FUTUR :: 4044';


// Message Erreur si le postId n'existe pas

//$_SESSION['postId'] = $Post->id;
$_SESSION['publicShare'] = $Post->public_share;

ob_start(); 

if(isset($_SESSION['error']))
{
    echo '<div class="main__bann">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}



echo '
<div class="post">
    <h1>' . $Post->title . '</h1> 

    <ul class="post__header">
        <li>Horizon : ' . $Post->projection . '</li>
        <li>Date : ' . $creationDate . '</li>
    </ul>

    <img src="/images/posts/' . $Post->id .'/' . $Post->img . '" alt="images de couverture"/>' .
    
    '<p>' . $Post->content . '</p>

    <em>';

    if($Post->modificationDate !== NULL)
    {
        echo 'Date de modification : ' . $modificationDate;
    }

    echo '</em>';

if(isset($_SESSION['admin']))
{
    if($_SESSION['admin']===1)
    {
        echo '
<div class = "post__admin">
    <a class="btn" href="/ModifyPost/?id=' . $Post->id . '">Modifier l\'article</a><br/>
    <a class="btn" href= "/DeletePost"> Delete </a><br/>
    <a class="btn" href="/SharePost">Public : ' . $Post->public_share . ' </a>
</div>

        ';  

    }
}
echo '</div>';

$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';