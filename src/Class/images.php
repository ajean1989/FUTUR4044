<?php 

declare(strict_types=1);


Class Images

{


public function postImg()
    {

        $this->getPosts('*');




        $handle = opendir('./images/posts');    // type : ressource

        $this->imgName = readdir($handle);      // type : string



        while(readdir($handle) !== false)
        {
            if(isset($_GET['id']))
            {
            preg_match('#post_' . $_GET['id'] . '\.[\w]{3,4}#', readdir($handle));
  
            return readdir($handle);
            }

        }

        closedir($handle);



        return $this->imgName;
    }


}
