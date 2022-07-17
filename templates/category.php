<?php 

$title = $category . ':: FUTUR :: 4044 ::';


ob_start();


foreach($Db->posts as $post)
{
    echo '<a href="/?id=' . $post->id . '">' . $post->title . '<br/>' . $post->content . '</a><br/>';
}


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');
