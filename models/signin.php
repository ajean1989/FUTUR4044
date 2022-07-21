<?php

/* 

* Connexion à la db 

* Ajout de l'utilisateur dans la db 

*/

declare(strict_types=1);



$Db = new Db;

$Users = new Users;

$Users->addUser();




