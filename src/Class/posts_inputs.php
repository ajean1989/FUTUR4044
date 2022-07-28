<?php 

declare(strict_types=1);

Class PostsInputs implements Inputs
{


    public string|bool $inputTitle; 
    public string|bool $inputContent; 
    public string|bool $inputHorizon; 
    public string|bool $inputCategory;



    public function Setinputs()
        // Entre les inputs en variables pour traitement
    {
        $this->inputTitle = isset($_POST['title']) ? $_POST['title'] : false ;
        $this->inputContent = isset($_POST['content']) ? $_POST['content'] : false ;
        $this->inputHorizon = isset($_POST['projection']) ? $_POST['projection'] : false ;
        $this->inputCategory = isset($_POST['category']) ? $_POST['category'] : false ;
    }


}