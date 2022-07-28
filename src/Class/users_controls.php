<?php 

declare(strict_types=1);


Class UsersControls extends UsersSafety
{

    public function birthMessage()
    // Affiche un message si la date de naissance est hors norme
    {

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

    }




    public function userAlreadyInDb()
    // Affiche un message si l'utilisateur est déjà enregistrer
    {

        if(isset($_SESSION['mail'])) // En cas de modification de profil
        {
            if($_SESSION['mail'] !== $this->inputMail)
            {
                foreach($GLOBALS['listUsers'] as $user)
                {
                    if($user->mail === $this->inputMail)
                    {
                        $_SESSION['error'] = ':: Modification impossible :: Adresse mail déjà enregistrée ::';
                        header('location: /profil');
                        exit();
                    }
                }
            }
        }
        else    // En cas d'inscription
        {
            foreach($GLOBALS['listUsers'] as $user)
            {
                if($user->mail === $this->inputMail)
                {
                    $_SESSION['error'] = ':: Adresse mail déjà enregistrée ::';
                    header('location: /inscription');
                    exit();
                }
            }
        }

    }


    public function comparePassword()
    {
        if($_POST['newPassword'] !== $_POST['newPasswordR'])
        {
            $_SESSION['error'] = ':: Les nouveaux mots de passe ne sont pas identiques ::';
            header('location: /password');
            exit;
        }
    }

}