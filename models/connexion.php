<?php

declare(strict_types=1);



$usersQuery = 'SELECT * FROM users';

$listUsers = Db::fetchall($usersQuery, 'Users');