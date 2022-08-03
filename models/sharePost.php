<?php

Db::connexion();

$query = 'UPDATE posts SET 
        public_share = \'' . $_SESSION['publicShare'] . '\'
        WHERE id = ' . $_SESSION['postId'] ;
        $statement = Db::$pdo->prepare($query);
        $statement->execute();