<?php

// Class récoltant la table users

// A voir à quoi sert cette class

declare(strict_types=1);

Class Users extends Db
{
    public string $name;
    public string $last_name;
    public string $birth;
    public string $mail;
    public int $admin;

    //public object $Db;

    public function getUsers(string $select)
    {


        self::connexion();

        $query = 'SELECT ' . $select . ' FROM users';
        $statement = self::$pdo->prepare($query);
        $statement->execute();
        $this->users = $statement->fetchall(PDO::FETCH_CLASS, 'Users');
        
    }

    public function addUser()
    {


        self::connexion();  
        
        self::safeInputs($_SERVER['REQUEST_URI']);




        // Vérifier si l'adresse mail est déjà en db

        $this->getUsers('mail');

        foreach($this->users as $user)
        {
            if($user->mail === $this->inputMail)
            {
                $_SESSION['error'] = ':: Adresse mail déjà enregistrée ::';
                header('location: /inscription');
                exit();
            }
        }


        // Traitement de la date de naissance

        $now = new Datetime();
        $birth = new Datetime($this->inputBirth);
        $diff = $now->diff($birth);

        if($diff->days >= 1  && $diff->invert === 0)
        {
            $_SESSION['error'] = ' :: Vous êtes dans le futur 😎 ::';
        }
        elseif($diff->y > 100 && $diff->invert === 1)
        {
            $_SESSION['error'] = ' :: Vous êtes un dinausaure 🦕 ::';
        }
        elseif($diff->y < 5 && $diff->invert === 1)
        {
            $_SESSION['error'] = ' :: Vous êtes un piou-piou 🐣🐥🐤 ::';
        }
   



        // Enregistrement dans la db

        $query = 'INSERT INTO users(name, last_name, birth, mail, password) VALUES (:name, :last_name, :birth, :mail, :password)';
        $statement = self::$pdo->prepare($query);
        $statement->execute([
            'name'=>$this->inputName,
            'last_name'=>$this->inputLastName,
            'birth'=>$this->inputBirth,
            'mail'=>$this->inputMail,
            'password'=>$this->inputPassword,
        ]);  
        
      
    }







}