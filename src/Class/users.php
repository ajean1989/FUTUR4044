<?php

// Class récoltant la table users

// A voir à quoi sert cette class

declare(strict_types=1);

Class Users extends CRUDUser
{

    // vars en DB

    public string $name;
    public string $last_name;
    public string $birth;
    public string $mail;
    public int $admin;


}