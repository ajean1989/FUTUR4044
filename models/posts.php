<?php

// model selection de d'article  // Voir pour tout entrer dans une Class


function getPosts($select)
{
global $pdo;
global $posts;

$query = 'SELECT ' . $select . ' FROM posts';
$statement = $pdo->prepare($query);
$statement->execute();
$posts = $statement->fetchall(PDO::FETCH_CLASS);
}

