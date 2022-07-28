<?php 

declare(strict_types=1);


Class UsersSafety extends UsersInputs implements Safety
{

    private int $lenName;
    private int $lenLastName;
    private int $lenBirth;
    private int $lenPassword;

    private string $regexName;
    private string $regexLastName;
    private string $regexBirth;
    private string $regexPassword;


    public function getLen($type='new')    
    {
        if($type !== 'password')
        {
            $this->lenName = strlen($this->inputName);
            $this->lenLastName = strlen($this->inputLastName);
            //$lenMail = strlen($this->inputMail);
            $this->lenBirth = strlen($this->inputBirth);
        }
        if($type==='new' || $type === 'password')
        {
                $this->lenPassword = strlen($this->inputPassword);
        }
    }


    public function setRegex($type='new')
    {
        if($type !== 'password')
        {
            $this->regexName = '#[^=”<>:/\*$()]{' . $this->lenName . '}#';
            $this->regexLastName = '#[^=”<>:/\*$()]{' . $this->lenLastName . '}#';
            $this->regexMail = '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
            $this->regexBirth = '#[0-9/-]{' . $this->lenBirth . '}#';
        }
        if($type==='new'|| $type === 'password')
        {
            $this->regexPassword = '#[^=”<>:/\*$()]{' . $this->lenPassword . '}#';
        }
     
    }


    public function errorExitAndMessage($message, $redirect)
    {
        $_SESSION['error'] = $message;
        header('location:' . $redirect);
        exit();
    }


    public function inputsControls($type='new')
    {
        $this->getLen($type);

        $this->setRegex($type);
    
        $pageName = $_SERVER['REQUEST_URI'];


        if($type !== 'password')
        {
            if(!preg_match($this->regexName, $this->inputName) || !preg_match($this->regexLastName, $this->inputLastName))
            {    
                $message = ':: Les caratères interdits pour le nom et prénom sont = ” < > / \ * $ ( ) ::';
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
        }
        if($type === 'new' || $type === 'password')
        {
            if(!preg_match($this->regexPassword, $this->inputPassword))
            {
                $message = ':: Les caratères interdits pour le mot de passe sont = ” < > / \ * $ ( ) ::';
                $this->errorExitAndMessage($message, $pageName);
            }
            elseif($this->lenPassword < 6)
            {    
                $message = ':: Le mot de passe doit faire au moins 6 caractères ::';
                $this->errorExitAndMessage($message, $pageName);
            }
        }
    }

    

    public function htmlspecialchars($type='new')
    {
        if($type !== 'password')
        {
            $this->inputName = htmlspecialchars($this->inputName);
            $this->inputLastName = htmlspecialchars($this->inputLastName);
            $this->inputMail = htmlspecialchars($this->inputMail);
            $this->inputBirth = htmlspecialchars($this->inputBirth);
        }
        if($type === 'new' || $type === 'password')
            {
                $this->inputPassword = SHA1($this->inputPassword);
            }

    }


}