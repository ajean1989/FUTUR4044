<?php

// Model selection user en db

function getUser($select)
{
global $pdo;
global $user;

$query = 'SELECT ' . $select . ' FROM users';
$statement = $pdo->prepare($query);
$statement->execute();
$user = $statement->fetchall(PDO::FETCH_CLASS);
}

