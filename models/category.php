<?php

declare(strict_types=1);



$categoryQuery = 'SELECT * FROM category INNER JOIN posts ON category.id = posts.category_id WHERE category.name = \'' . $category .'\'';

$listMainPosts = Db::fetchall($categoryQuery, 'Posts');

foreach($listMainPosts as $post)
{
    $post->returnIntro();
}

