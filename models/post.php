<?php

declare(strict_types=1);



$postQuery = 'SELECT * FROM posts WHERE id = ' . $postId;

$Post = Db::fetch($postQuery, 'Posts');