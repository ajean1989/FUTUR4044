<?php

// Class avec des méthodes pour se connecter à la db / SELECT / INSERT INTO 

declare(strict_types=1);

Class Db
{
    public static object $pdo;

    public mixed $posts; 
    public mixed $users;


    public static function connexion()
    {
        try
            {

            self::$pdo = new PDO('mysql:host=localhost;dbname=planete_futur;charset=utf8;port=3306',
                    'adrien',
                    'adr13NjMy',
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                    )   ;
            }
        catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }

    }

    public function getPosts(string $select)
    {
        
        self::connexion();

        $query = 'SELECT ' . $select . ' FROM posts';
        $statement = self::$pdo->prepare($query);
        $statement->execute();
        $this->posts = $statement->fetchall(PDO::FETCH_CLASS, 'Posts');   // posts, nouvelle instance de Posts, prop de Db

    }

    public function getUsers(string $select)
    {
        self::connexion();

        $query = 'SELECT ' . $select . ' FROM users';
        $statement = self::$pdo->prepare($query);
        $statement->execute();
        $this->users = $statement->fetchall(PDO::FETCH_CLASS, 'Users');
        
    }

    

}
