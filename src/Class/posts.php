<?php 

// Class récupérant les articles et les classent par catégorie si besoin

// voir comment récupérer un blob, 

// une date est une string traitée avec DateTime

declare(strict_types=1);

Class Posts extends Db
{
    public int $id;
    public mixed $date;
    public mixed $category_id;
    public string $title;
    public string $content;
    public mixed $projection;
    public int $public_share;

    public mixed $posts;

   
    public function getPost(string $select, $where = null)
    {
        
        self::connexion();

        self::safeInputs($_SERVER['REQUEST_URI']);

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
        $this->posts = $statement->fetchall(PDO::FETCH_CLASS, 'Posts');   // posts, nouvelle instance de Posts
    }

    public function addPost()
    {
        self::connexion();

        self::safeInputs($_SERVER['REQUEST_URI']);

        $query = 'INSERT INTO posts(category_id, title, content, projection) VALUES (:category_id, :title, :content, :projection)';
        $statement = self::$pdo->prepare($query);
        $statement->execute([
            'category_id'=>$_POST['category'],
            'title'=>$this->inputTitle,
            'content'=>$this->inputContent,
            'projection'=>$this->inputHorizon,
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