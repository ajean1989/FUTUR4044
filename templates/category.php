<?php 

$title = $category . ':: FUTUR :: 4044 ::';


ob_start();

echo '<div class="main__bann">' . $category . '</div>';



echo '<ul>';



foreach($listCategoryPosts as $post)
{
    echo 
    '<div class="main__posts">
    <li>
    <img class="main__postImg" src="/images/posts/" alt="images de couverture"/> 
    <div>
    <h2><a href="/?id=' . $post->id . '">' . $post->title . '</h2></a><br/>
    <p>' . $post->content . '</p>
    </div></li>
    </div>'
    ;
}

echo '</ul>';


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');
