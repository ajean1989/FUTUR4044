<?php 

declare(strict_types=1);



$mainPostsQuery = 'SELECT * FROM posts';

$listMainPosts = dB::fetchAll($mainPostsQuery, 'Posts');

//Test::var_dump($listMainPosts);

foreach($listMainPosts as $post)
{
    $post->returnIntro();
}