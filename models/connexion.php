<?php

declare(strict_types=1);

$Db = new Db;

$Users = new Users;

$Users->getUsers('*');