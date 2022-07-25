<?php

declare(strict_types=1);



$PostsInputs = new PostsInputs;
$PostsSafety = new PostsSafety;
$PostsControls = new PostsControls;
$AddPost = new AddPost ;

$AddPost->addPost();



// Pour récupérer l'id du post à intégrer au header location du controler



//$postsQuery = 'SELECT id FROM posts WHERE title = \'' . $AddPost->inputTitle . '\'';

//$Post = Db::fetch($postsQuery, 'posts');