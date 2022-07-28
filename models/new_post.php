<?php

declare(strict_types=1);



$PostsInputs = new PostsInputs;
$PostsSafety = new PostsSafety;
$PostsControls = new PostsControls;
$AddPost = new AddPost ;

$AddPost->addPost();

// Récupère le dernier post (pour le controler)

$lastPostQuery = 'SELECT * FROM posts WHERE id = (SELECT max(id) FROM posts)';
$LastPost = Db::fetch($lastPostQuery, 'Posts');



