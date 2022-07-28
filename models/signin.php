<?php


declare(strict_types=1);



// Pour la fonction userAlreadyInDb()

$usersQuery = 'SELECT mail FROM users';
$listUsers = Db::fetchall($usersQuery, 'Users');


// Ajout en DB

$UsersInputs = new UsersInputs;
$UsersSafety = new UsersSafety;
$UsersControls = new UsersControls;
$AddUser = new CRUDUser;
$Users = new Users;


$Users->addUser();