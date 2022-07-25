<?php 

// Class récupérant les articles et les classent par catégorie si besoin

// voir comment récupérer un blob, 

// une date est une string traitée avec DateTime

declare(strict_types=1);

Class Posts extends PostsControls
{

    // var in db

    public int $id;
    public mixed $date;
    public int $category_id;
    public string $title;
    public string $content;
    public mixed $projection;
    public int $public_share;

   
    /* 


    public function postImg() : string
    {

        $this->getPosts('*');

        $handle = opendir('./images/posts');

        $this->imgName = readdir($handle);



        while(readdir($handle) !== false)
        {
            if(isset($_GET['id']))
            {
            preg_match('#post_' . $_GET['id'] . '\.[\w]{3,4}#', readdir($handle));
  
            var_dump(readdir($handle));
            echo '<br/>';
            }
            else
            {
                preg_match('#post_' . $this->Posts->posts->id . '\.[\w]{3,4}#', readdir($handle));
  
            var_dump(readdir($handle));
            echo '<br/>';
            }
        
        }

        closedir($handle);



        return $this->imgName;
    }

    */

}