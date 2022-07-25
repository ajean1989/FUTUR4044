<?php 

declare(strict_types=1);



Class addPost extends PostsControls
{

    public object $LastPost;

    public function addPost()
    {
        Db::connexion();

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




         // Gestion de l'image


        $lastPostQuery = 'SELECT * FROM posts WHERE id = (SELECT max(id) FROM posts)';
        $this->LastPost = Db::fetch($lastPostQuery, 'Posts');


         

        $img = $_FILES['img'];
        $ext = strtolower(substr($img['name'],-4));  // On récupère les 3 dernières lettres du fichier
        $allow_ext = array(".jpg",".png",".gif");
        if(in_array($ext,$allow_ext))
        {
            move_uploaded_file($img['tmp_name'], "./images/posts/post_". $this->LastPost->id . $ext );
        }
        else
        {
            $_SESSION['error'] = ':: format image non supporté (jpg, jpeg, png, gif) ::';
            header('location: /nouvel_article');
            exit();
        }


        
  
        $imgName = (string) 'post_' . $this->LastPost->id . $ext;
       
        $updateImgQuery = 'UPDATE posts SET img = :img WHERE id = (SELECT * FROM (SELECT id FROM posts WHERE id = (SELECT max(id) FROM posts)) AS m)';  
        // https://stackoverflow.com/questions/45494/mysql-error-1093-cant-specify-target-table-for-update-in-from-clause
        $query = $updateImgQuery;
        $statement = Db::$pdo->prepare($query);
        $statement->execute([
            'img'=>$imgName,
        ]);
        
    }
    
}