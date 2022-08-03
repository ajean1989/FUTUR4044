<?php 

declare(strict_types=1);



Class CRUDPost extends PostsControls
{

    public object $LastPost;

    public function addPost()
    {
        Db::connexion();

        $_SESSION['saveContent'] = $_POST['content'];
        $_SESSION['saveTitle'] = $_POST['title'];
        $_SESSION['saveProjection'] = $_POST['projection'];

        $this->setInputs();

        $this->inputsControls();

        $this->htmlspecialchars();



        $query = 'INSERT INTO posts(category_id, title, content, projection) VALUES (:category_id, :title, :content, :projection)';
        $statement = Db::$pdo->prepare($query);
        $statement->execute([
            'category_id'=>$_POST['category'],
            'title'=>$this->inputTitle,
            'content'=>$this->inputContent,
            'projection'=>$this->inputHorizon,

        ]); 


        // Gestion de l'image de couverture

        Images::postMainImg();

        Images::PostIllustrations();


        
    }




    public function modifyPost()
    {  

        Db::connexion();

        $this->setInputs();

        $this->inputsControls();

        $this->htmlspecialchars();

        $ModificationDate = new Datetime();
        $ModificationDate = $ModificationDate->format('Y-m-d');
     

        $query = 'UPDATE posts SET 
        category_id = \'' . $_POST['category'] . '\', 
        title = \'' . $this->inputTitle . '\',
        content = \'' . $this->inputContent . '\',
        projection = \'' .$this->inputHorizon . '\',
        modificationDate = \'' . $ModificationDate . '\'
        WHERE id = ' . $_SESSION['postId'] ;
        $statement = Db::$pdo->prepare($query);
        $statement->execute(); 


        // Gestion de l'image de couverture

        Images::postMainImg('modify');

        Images::PostIllustrations('modify');
    }


    public function deletePost()
    {

        Db::connexion();  

        $queryUpdatePassword = 'DELETE FROM posts WHERE id = \'' . $_SESSION['postId'] . '\'';
        $statement = Db::$pdo->prepare($queryUpdatePassword);
        $statement->execute();  
        
      
    }
}