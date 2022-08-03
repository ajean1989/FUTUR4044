<?php 

declare(strict_types=1);


Class Images

{


    public static function postMainImg($type = 'Last Post') 
    // Traite l'image de couverture et créer le dossier images/post/$id
    {

        if($type === 'Last Post')   // Pour un nouveau post
        {

        $lastPostQuery = 'SELECT * FROM posts WHERE id = (SELECT max(id) FROM posts)';
        $LastPost = Db::fetch($lastPostQuery, 'Posts');

        $postId = $LastPost->id;

        mkdir('./images/posts/' . $LastPost->id);

        }
        else  // En cas de modification du post
        {
            $PostQuery = 'SELECT * FROM posts WHERE id = \'' . $_SESSION['postId'] . '\'';
            $LastPost = Db::fetch($PostQuery, 'Posts');

            $postId = $_SESSION['postId'];
        }


        //Test des images (extension, taille)

        $img = $_FILES['img'];

        $maxSize = (int) 10000000;
        $imgSize = filesize($img['tmp_name']);
        if($imgSize > $maxSize)
        {
            $_SESSION['error'] = ':: Too big, 10Mo max ::';
            header('location: /nouvel_article');
            exit();
        }

        $ext = strtolower(substr($img['name'],-4));  // On récupère les 3 dernières lettres du fichier
        $allow_ext = array(".jpg",".png",".gif");
        if(in_array($ext,$allow_ext))
        {
            move_uploaded_file($img['tmp_name'], './images/posts/' .  $postId . '/couv_'. $postId . $ext );
        }
        else
        {
            $_SESSION['error'] = ':: format image non supporté (jpg, jpeg, png, gif) ::';
            header('location: /nouvel_article');
            exit();
        }


        // Update le dernier post avec le nom du fichier contenant l'id
  
        $imgName = (string) 'couv_' . $postId . $ext;

        if($type === 'Last Post')   // Pour un nouveau post
        {  
            $updateImgQuery = 'UPDATE posts SET img = :img WHERE id = (SELECT * FROM (SELECT id FROM posts WHERE id = (SELECT max(id) FROM posts)) AS m)';  
            // https://stackoverflow.com/questions/45494/mysql-error-1093-cant-specify-target-table-for-update-in-from-clause
            $query = $updateImgQuery;
            $statement = Db::$pdo->prepare($query);
            $statement->execute([
                'img'=>$imgName,
            ]);
        }
        else    // En cas de modification du post
        {
            $updateImgQuery = 'UPDATE posts SET img = :img WHERE id = \'' . $_SESSION['postId'] . '\'';  
            $query = $updateImgQuery;
            $statement = Db::$pdo->prepare($query);
            $statement->execute([
                'img'=>$imgName,
            ]);
        }

    }





    public static function PostIllustrations($type = 'Last Post')
    {

        if($type === 'Last Post')   // Pour un nouveau post
        {

            $lastPostQuery = 'SELECT * FROM posts WHERE id = (SELECT max(id) FROM posts)';
            $LastPost = Db::fetch($lastPostQuery, 'Posts');

            $postId = $LastPost->id;
        }
        else    // En cas de modification du post
        {
            $PostQuery = 'SELECT * FROM posts WHERE id = \'' . $_SESSION['postId'] . '\'';
            $LastPost = Db::fetch($PostQuery, 'Posts');

            $postId = $_SESSION['postId'];
        }




        for($i=0 ; $i<6 ; $i++) //Form propose que 5 entrées
        {
            

            if($_FILES['img'.$i]['error'] === 0)
            {
                $img = $_FILES['img'.$i];

                $maxSize = (int) 10000000;
                $imgSize = filesize($img['tmp_name']);
                if($imgSize > $maxSize)
                {
                    $_SESSION['error'] = ':: Illustration ' . $i . ' too big, 10Mo max ::';
                    header('location: /nouvel_article');
                    exit();
                }

                $ext = strtolower(substr($img['name'],-4));  // On récupère les 3 dernières lettres du fichier
                $allow_ext = array(".jpg",".png",".gif");
                if(in_array($ext,$allow_ext))
                {
                    if($i === 0) // Sinon impossible de récupérer l'ext dans l'affichage de la miniature. Ici on peut utilser la colone image_name de la bd.
                    {
                        move_uploaded_file($img['tmp_name'], './images/posts/' .  $postId . '/mincouv_'. $postId . $ext ); 
                    }
                    else
                    {
                    move_uploaded_file($img['tmp_name'], './images/posts/' .  $postId . '/img_'. $i . $ext );
                    //écrase si nouveau fichier
                    }
                }
                else
                {
                    $_SESSION['error'] = ':: format image ' . $i . ' non supporté (jpg, jpeg, png, gif) ::';
                    header('location: /nouvel_article');
                    exit();
                }
            }

        }

    }
    
}
