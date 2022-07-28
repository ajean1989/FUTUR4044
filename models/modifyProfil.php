<?php 

declare(strict_types=1);


// Pour la fonction alreadyInDb

$usersQuery = 'SELECT mail FROM users';
$listUsers = Db::fetchall($usersQuery, 'Users');



$AddUser = new CRUDUser;
$AddUser->modifyUser();



