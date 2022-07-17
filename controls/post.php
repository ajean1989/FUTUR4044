<?php

/* 

Contrôle de $postId / id existant

Va cherhcer en db les donnée de l'id $postId

*/

declare(strict_types=1);

require_once $modelsDirectory . 'post.php';

foreach($Db->posts as $post)
{
    //echo $postId . '<br/>' . $post->id;

    
    if ($postId === $post->id)
    {
        echo 'ok';
        require_once $templatesDirectory . 'post.php';
    }
  
}

