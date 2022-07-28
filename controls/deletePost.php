<?php


declare(strict_types=1);


$DeletePost = new CRUDPost;

$DeletePost->deletePost();


$_SESSION['error'] = ':: L\'article a été supprimé ::';

header("location: /");
exit();