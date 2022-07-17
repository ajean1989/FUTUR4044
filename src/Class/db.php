<?php

// Class avec des méthodes pour se connecter à la db / SELECT / INSERT INTO 

declare(strict_types=1);

Class Db
{
    public static object $pdo;

    public mixed $posts; 
    public mixed $users;
    public mixed $category;


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

    public function getPost(string $select, $where = null)
    {
        
        self::connexion();

        $query = 'SELECT ' . $select . ' FROM posts ' . $where;
        $statement = self::$pdo->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Posts');
        $statement->execute();
        $this->posts = $statement->fetch(PDO::FETCH_CLASS);   // posts, nouvelle instance de Posts, prop de Db


    }

    public function getPosts(string $select, $where = null)
    {
        
        self::connexion();

        $query = 'SELECT ' . $select . ' FROM posts ' . $where;
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

    public function addUser()
    {
        self::connexion();

        $cryptedPassword = SHA1($_POST['password']);

        $query = 'INSERT INTO users(name, last_name, birth, mail, password) VALUES (:name, :lastname, :birth, :mail, :password)';
        $statement = self::$pdo->prepare($query);
        $statement->execute([
            'name'=>$_POST['name'],
            'lastname'=>$_POST['lastname'],
            'birth'=>$_POST['birth'],
            'mail'=>$_POST['mail'],
            'password'=>$cryptedPassword,
        ]);            ;
    }

    public function addPost()
    {
        self::connexion();

        $query = 'INSERT INTO posts(category_id, title, content, projection) VALUES (:category_id, :title, :content, :projection)';
        $statement = self::$pdo->prepare($query);
        $statement->execute([
            'category_id'=>$_POST['category'],
            'title'=>$_POST['title'],
            'content'=>$_POST['content'],
            'projection'=>$_POST['projection'],
        ]);  
    }

    public function getCategory($select, $where = null)
    {
        self::connexion();

        $query = 'SELECT ' . $select . ' FROM category ' . $where;
        $statement = self::$pdo->prepare($query);
        $statement->execute();
        $this->category = $statement->fetchall(PDO::FETCH_ASSOC);

    }
    
    public function getPostsByCategory($category)
    {
        //Table category -> name & table posts -> category_id
    
        self::connexion();

        $query = 'SELECT * FROM category INNER JOIN posts ON category.id = posts.category_id WHERE category.name = \'' . $category .'\'';
        $statement = self::$pdo->prepare($query);
        $statement->execute();
        $this->posts = $statement->fetchall(PDO::FETCH_CLASS, 'Posts');
    }

    

}
