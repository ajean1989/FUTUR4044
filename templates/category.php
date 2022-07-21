<?php 

$title = $category . ':: FUTUR :: 4044 ::';


ob_start();

echo '<div class="main__bann">' . $category . '</div>';



echo '<ul>';



foreach($Posts->posts as $post)
{
    echo '<div class="main__posts"><li><h2><a href="/?id=' . $post->id . '">' . $post->title . '</h2></a><br/>' . $post->content . '</li></div>';
}

echo '</ul>';


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');
