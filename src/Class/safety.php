<?php 

declare(strict_types=1);


interface safety
{


    public function getLen();    


    public  function setRegex();


    public function errorExitAndMessage($message, $redirect);


    public  function inputsControls();
   

    public function htmlspecialchars();

    

    
}