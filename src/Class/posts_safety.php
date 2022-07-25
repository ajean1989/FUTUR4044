<?php 

declare(strict_types=1);


Class PostsSafety extends PostsInputs implements Safety
{


    private int $lenTitle;
    private int $lenHorizon;

    private string $regexTitle;
    private string $regexHorizon;



    public function getLen()
    {

        $this->lenTitle = strlen($this->inputTitle);
        //$lenContent = strlen($this->inputContent);
        $this->lenHorizon = strlen($this->inputHorizon);
        //$lenCategory = strlen($this->inputCategory);

    }




    public function setRegex()
    {

        $this->getLen();
     
        $this->regexTitle = '#[^<>*]{' . $this->lenTitle . '}#i';
        //$regexContent;
        $this->regexHorizon = '#[0-9]{' . $this->lenHorizon . '}#';

    }




    public function errorExitAndMessage($message, $redirect)
    {

        $_SESSION['error'] = $message;
        header('location:' . $redirect);
        exit();

    }




    public function inputsControls()
    {

        $this->setRegex();

        $pageName = $_SERVER['REQUEST_URI'];


        if($pageName === '/nouvel_article')
        {
            if(!preg_match($this->regexTitle, $this->inputTitle))
            {  
                $message = ':: Le titre comporte un des caractères suivants : &lt &gt * ::';
                $this->errorExitAndMessage($message, $pageName);
            }
            elseif(!preg_match($this->regexHorizon, $this->inputHorizon))
            {
                $message = ':: ... L\'horizon n\'est pas une année ... :: ';
                $this->errorExitAndMessage($message, $pageName);
            }
        }

    }


    public function htmlspecialchars()
    // Conversion des inputs au format HTML
    {

        $this->inputTitle = htmlspecialchars($this->inputTitle);
        $this->inputContent =  htmlspecialchars($this->inputContent);
        $this->inputHorizon =  htmlspecialchars($this->inputHorizon);
        $this->inputCategory = htmlspecialchars($this->inputCategory);

    }

    
}