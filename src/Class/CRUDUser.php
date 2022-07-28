<?php 

declare(strict_types=1);



Class CRUDUser extends UsersControls
{

    public function addUser()
    {

        Db::connexion();  

        $this->Setinputs();         

        $this->inputsControls();

        $this->userAlreadyInDb();

        $this->birthMessage();
        

        $query = 'INSERT INTO users(name, last_name, birth, mail, password) VALUES (:name, :last_name, :birth, :mail, :password)';
        $statement = Db::$pdo->prepare($query);
        $statement->execute([
            'name'=>$this->inputName,
            'last_name'=>$this->inputLastName,
            'birth'=>$this->inputBirth,
            'mail'=>$this->inputMail,
            'password'=>$this->inputPassword,
        ]);  
        
      
    }

    public function modifyUser()
    {

        Db::connexion();  

        $this->Setinputs();         

        $this->inputsControls('modify');

        $this->htmlspecialchars('modify');

        $this->userAlreadyInDb();


        $queryUpdateUser = 'UPDATE users SET
        mail = \'' . $this->inputMail . '\',
        name = \'' . $this->inputName . '\',
        last_name = \'' . $this->inputLastName . '\',
        birth = \'' . $this->inputBirth . '\'
        WHERE mail = \'' . $_SESSION['mail'] . '\'';
        
        $statement = Db::$pdo->prepare($queryUpdateUser);
        $statement->execute();  
        
      
    }

    public function modifyPassword()
    {

        Db::connexion();  

        $this->comparePassword();

        $this->SetInputForNewPassword();         

        $this->inputsControls('password');

        $this->htmlspecialchars('password'); // Pour le SHA1




        $queryUpdatePassword = 'UPDATE users SET
        password = \'' . $this->inputPassword . '\'
        WHERE mail = \'' . $_SESSION['mail'] . '\'';
        
        $statement = Db::$pdo->prepare($queryUpdatePassword);
        $statement->execute();  
        
      
    }



}
