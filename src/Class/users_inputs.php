<?php 

declare(strict_types=1);

Class UsersInputs implements Inputs
{

    public string|bool $inputName;
    public string|bool $inputLastName;
    public string|bool $inputMail;
    public string|bool $inputBirth;
    public string|bool $inputPassword;

   


    public  function Setinputs()
    {

        $this->inputName = isset($_POST['name']) ? $_POST['name'] : false ;
        $this->inputLastName = isset($_POST['last_name']) ? $_POST['last_name'] : false ; 
        $this->inputMail = isset($_POST['mail']) ? $_POST['mail'] : false ;
        $this->inputBirth = isset($_POST['birth']) ? $_POST['birth']  : false ;
        $this->inputPassword = isset($_POST['password']) ? $_POST['password']: false ;

    }

    public  function SetInputForNewPassword()
    {


        $this->inputPassword = isset($_POST['newPassword']) ? $_POST['newPassword']: false ;

    }

   


}