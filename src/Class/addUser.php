<?php 

declare(strict_types=1);



Class addUser extends UsersControls
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



}
