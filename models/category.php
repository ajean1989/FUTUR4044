<?php

declare(strict_types=1);



$categoryQuery = 'SELECT * FROM category INNER JOIN posts ON category.id = posts.category_id WHERE category.name = \'' . $category .'\'';

$listCategoryPosts = Db::fetchall($categoryQuery, 'Posts');

foreach($listCategoryPosts as $post)
{
    $post->returnIntro();
}