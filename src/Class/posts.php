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

    public string $intro;

    

   
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

    public function imgTreatment()
    {


        $imgName = [];
        $nbImg = (int) 1;

        $file = scandir('./images/posts/' . $this->id);

        foreach($file as $img)
        {
            if(preg_match('#^img#',$img))
            {
                $imgName[$nbImg] = $img;
                $nbImg++;
            }
        }


        for($i=1 ; $i < $nbImg ; $i++)
        {
            $regImg[$i] = '#\[img' . $i . '\]#';
            $htmlImg[$i] = '<img src="./images/posts/' . $this->id . '/' . $imgName[$i] . '" alt="illustration_' . $i .'" />';
  
            $this->content = preg_replace($regImg[$i], $htmlImg[$i], $this->content);
    
        }

    }

    public function titleInPost()
    {

        $this->content = preg_replace('-##-', '<h2>', $this->content);
        $this->content = preg_replace('-/#-', '</h2>', $this->content);
        
    }

    public function emInPost()
    {

        $this->content = preg_replace('-\[em\]-', '<em>', $this->content);
        $this->content = preg_replace('-\[/em\]-', '</em>', $this->content);
        
    }

    public function intro()
    {

        $this->content = preg_replace('-\[intro\]-', '<div class="intro">', $this->content);
        $this->content = preg_replace('-\[/intro\]-', '</div>', $this->content);
        
    }

    public function returnIntro()
    {
        $firstExplode = explode('[intro]', $this->content);
        //Test::var_dump($firstExplode);
        $secondExplode = explode('[/intro]', $firstExplode[1]);
        $this->intro = $secondExplode[0];

    
    }

    public function hyperlinkInPost()
    {
        
        $explodeContent = explode(' ', $this->content);
        

        $i = (int) 0;

        foreach($explodeContent as $row)
        {
            if(preg_match('-\[a=.{1,}\]-', $row))
            {
                $rawLink = substr($row,3,-1);    
                $row = preg_replace('-\[a=.{1,}\]-', '<a href=' . $rawLink . ' target="_blank">', $row);
                $explodeContent[$i] = $row;
            }
            $i++;
        }

        //Test::var_dump($explodeContent);

        $this->content = implode(' ', $explodeContent);
        
        
        $this->content = preg_replace('-\[/a\]-', '</a>', $this->content);

    }

    public function nl2brContent()
    {
        $this->content = nl2br($this->content);
    }

}