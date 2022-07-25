<?php 

declare(strict_types=1);


Class UsersSafety extends UsersInputs implements Safety
{

    // Paramètres utiles

    private int $lenName;
    private int $lenLastName;
    private int $lenBirth;
    private int $lenPassword;

    private string $regexName;
    private string $regexLastName;
    private string $regexBirth;
    private string $regexPassword;



    public function getLen()    
    {

    $this->lenName = strlen($this->inputName);
    $this->lenLastName = strlen($this->inputLastName);
    //$lenMail = strlen($this->inputMail);
    $this->lenBirth = strlen($this->inputBirth);
    $this->lenPassword = strlen($this->inputPassword);

    }



    public function setRegex()
    {

        $this->getLen();

        $this->regexName = '#[^=”<>:/\*$]{' . $this->lenName . '}#';
        $this->regexLastName = '#[^=”<>:/\*$]{' . $this->lenLastName . '}#';
        $this->regexMail = '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
        $this->regexBirth = '#[0-9/-]{' . $this->lenBirth . '}#';
        $this->regexPassword = '#[^=”<>:/\*$]{' . $this->lenPassword . '}#';
     
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



        if($pageName === '/inscription')
        {
            if(!preg_match($this->regexName, $this->inputName) || !preg_match($this->regexLastName, $this->inputLastName))
            {    
                $message = ':: Les caratères interdits pour le nom et prénom sont = ” < > / \ * $ ::';
                $this->errorExitAndMessage($message, $pageName);
            }
            elseif(!preg_match($this->regexBirth, $this->inputBirth))
            {
                $message = ':: La date de naissance n\'est pas au bon format :: ';
                $this->errorExitAndMessage($message, $pageName);
            }
            elseif(!preg_match($this->regexMail, $this->inputMail))
            {
                $message = ':: Adresse mail non valide ::';
                $this->errorExitAndMessage($message, $pageName);
            }
            elseif(!preg_match($this->regexPassword, $this->inputPassword))
            {
                $message = ':: Les caratères interdits pour le mot de passe sont = ” < > / \ * $ ::';
                $this->errorExitAndMessage($message, $pageName);
            }
            elseif($this->lenPassword < 6)
            {    
                $message = ':: Le mot de passe doit faire au moins 6 caractères ::';
                $this->errorExitAndMessage($message, $pageName);
            }
        }

    }


    public function htmlspecialchars()
    {

        $this->inputName = htmlspecialchars($this->inputName);
        $this->inputLastName = htmlspecialchars($this->inputLastName);
        $this->inputMail = htmlspecialchars($this->inputMail);
        $this->inputBirth = htmlspecialchars($this->inputBirth);
        $this->inputPassword = SHA1($this->inputPassword);

    }


}