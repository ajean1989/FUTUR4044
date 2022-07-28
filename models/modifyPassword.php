<?php 

declare(strict_types=1);

// Pour le contrôle de l'ancien password
$usersQuery = 'SELECT password FROM users WHERE mail = \'' .  $_SESSION['mail'] . '\'';
$password = Db::fetch($usersQuery, 'Users');



$NewPassword = new CRUDUser;
$NewPassword->modifyPassword();



