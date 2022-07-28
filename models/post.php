<?php

declare(strict_types=1);



$postQuery = 'SELECT * FROM posts WHERE id = ' . $postId;

$Post= new Posts;

$Post = Db::fetch($postQuery, 'Posts');



