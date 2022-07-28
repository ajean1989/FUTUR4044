<?php 

declare(strict_types=1);


Class PostsSafety extends PostsInputs implements Safety
{

    private int $lenTitle;

    private string $regexTitle;
    private string $regexHorizon;

    // Bloc fonctionnant ensemble 

    public function getLen()
    {
        $this->lenTitle = strlen($this->inputTitle);
        $this->lenContent = strlen($this->inputContent);
    }


    public function setRegex()
    {
        $this->getLen();
     
        $this->regexTitle = '#[^<>*]{' . $this->lenTitle . '}#i';
        $this->regexContent = '#[^<>*]{' . $this->lenContent . '}#i';
        $this->regexHorizon = '#2[0-9]{3}#';
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

        if(!preg_match($this->regexTitle, $this->inputTitle))
        {  
            $message = ':: Le titre comporte un des caractères suivants : &lt &gt * ::';
            $this->errorExitAndMessage($message, $pageName);
        }
        elseif(!preg_match($this->regexContent, $this->inputContent))
        {  
            $message = ':: Contenu avec des terme ou symboles interdits ::';
            $this->errorExitAndMessage($message, $pageName);
        }
        elseif(!preg_match($this->regexHorizon, $this->inputHorizon))
        {
            $message = ':: ... L\'horizon n\'est pas une année ... :: ';
            $this->errorExitAndMessage($message, $pageName);
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