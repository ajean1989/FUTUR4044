<?php 

declare(strict_types=1);



$mainPostsQuery = 'SELECT * FROM posts';

$listMainPosts = dB::fetchAll($mainPostsQuery, 'Posts');