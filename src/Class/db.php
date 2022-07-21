<?php

// Class avec des méthodes pour se connecter à la db / SELECT / INSERT INTO 

declare(strict_types=1);

Class Db
{
    public static object $pdo;

        // Variables Users

    public string $inputName;
    public string $inputLastName;  
    public string $inputMail;
    public string $inputBirth;
    public string $inputPassword; 

        // Variables Posts

    public string $inputTitle; 
    public string $inputContent; 
    public string $inputHorizon; 
    public string $inputCategory;


    public static function connexion()
    {
        try
            {

            self::$pdo = new PDO('mysql:host=localhost;dbname=planete_futur;charset=utf8;port=3306',
                    'adrien',
                    'adr13NjMy',
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                    )   ;
            }
        catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }

    }

    public function safeInputs($pageName)
    {


        // (récupère les entrées)

            // User

        $this->inputName = isset($_POST['name']) ? $_POST['name'] : '' ;
        $this->inputLastName = isset($_POST['last_name']) ? $_POST['last_name'] : '' ; 
        $this->inputMail = isset($_POST['mail']) ? $_POST['mail'] : '' ;
        $this->inputBirth = isset($_POST['birth']) ? $_POST['birth']  : '' ;
        $this->inputPassword = isset($_POST['password']) ? $_POST['password']: '' ;

            // Posts

        $this->inputTitle = isset($_POST['title']) ? $_POST['title'] : '' ;
        $this->inputContent = isset($_POST['content']) ? $_POST['content'] : '' ;
        $this->inputHorizon = isset($_POST['projection']) ? $_POST['projection'] : '' ;
        $this->inputCategory = isset($_POST['category']) ? $_POST['category'] : '' ;
    

    

        // set la longueur 

        $lenName = strlen($this->inputName);
        $lenLastName = strlen($this->inputLastName);
        //$lenMail = strlen($inputMail);
        $lenBirth = strlen($this->inputBirth);
        $lenPassword = strlen($this->inputPassword);

        $lenTitle = strlen($this->inputTitle);
        //$lenContent = strlen($this->inputContent);
        $lenHorizon = strlen($this->inputHorizon);
        //$lenCategory = strlen($this->inputCategory);



    



        // Définit les regex

            // User

        $regexName = '#[^=”<>:/\*$]{' . $lenName . '}#';
        $regexLastName = '#[^=”<>:/\*$]{' . $lenLastName . '}#';
        $regexMail = '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';
        $regexBirth = '#[0-9/-]{' . $lenBirth . '}#';
        $regexPassword = '#[^=”<>:/\*$]{' . $lenPassword . '}#';
    
                // Post
    
        $regexTitle = '#[^<>*]{' . $lenTitle . '}#i';
        //$regexContent;
        $regexHorizon = '#[0-9]{' . $lenHorizon . '}#';



        // Traite avec une regex

        if($pageName === '/inscription')
        {
            if(!preg_match($regexName, $this->inputName) || !preg_match($regexLastName, $this->inputLastName))
            {    
                $_SESSION['error'] = ':: Les caratères interdits pour le nom et prénom sont = ” < > / \ * $ ::';
                header('location: /inscription');
                exit();
            }
            elseif(!preg_match($regexBirth, $this->inputBirth))
            {
                $_SESSION['error'] = ':: La date de naissance n\'est pas au bon format :: ';
                header('location: /inscription');
                exit();
            }
            elseif(!preg_match($regexMail, $this->inputMail))
            {
                $_SESSION['error'] = ':: Adresse mail non valide ::';
                header('location: /inscription');
                exit();
            }
            elseif(!preg_match($regexPassword, $this->inputPassword))
            {
                $_SESSION['error'] = ':: Les caratères interdits pour le mot de passe sont = ” < > / \ * $ ::';
                header('location: /inscription');
                exit();
            }
            elseif($lenPassword < 6)
            {    
                $_SESSION['error'] = ':: Le mot de passe doit faire au moins 6 caractères ::';
                header('location: /inscription');
                exit();
            }
            else
            {
                //$_SESSION['error'] = 'none';

            }
        }

/* 
        elseif($pageName === '/connexion')
        {
            if(!preg_match($regexMail, $this->inputMail) && !preg_match($regexPassword, $this->inputPassword))
            {
                $_SESSION['error'] = ':: ... Erreur ...  ::';
                header('location: /connexion');
                exit();
            }
            else
            {
                //$_SESSION['error'] = 'none';
            }
        }

*/


        elseif($pageName === '/nouvel_article')
        {
            if(!preg_match($regexTitle, $this->inputTitle))
            {    
                $_SESSION['error'] = ':: Le titre comporte un des caractères suivants : &lt &gt * ::';
                header('location: /nouvel_article');
                exit();
            }
            elseif(!preg_match($regexHorizon, $this->inputHorizon))
            {
                $_SESSION['error'] = ':: ... L\'horizon n\'est pas une année ... :: ';
                header('location: /nouvel_article');
                exit();
            }
            else
            {
                //$_SESSION['error'] = 'none';
            }
        }

      

        // Ajout de htmlspecialchar

            // Users

        $this->inputName = htmlspecialchars($this->inputName);
        $this->inputLastName = htmlspecialchars($this->inputLastName);
        $this->inputMail = htmlspecialchars($this->inputMail);
        $this->inputBirth = htmlspecialchars($this->inputBirth);
        $this->inputPassword = SHA1($this->inputPassword);

            // Posts

        $this->inputTitle = htmlspecialchars($this->inputTitle);
        $this->inputContent =  htmlspecialchars($this->inputContent);
        $this->inputHorizon =  htmlspecialchars($this->inputHorizon);
        $this->inputCategory = htmlspecialchars($this->inputCategory);


        // A présent on peut entrer ces données en db o:)

    }
}


    