<?php

// Affiche le contenue de la page d'accueil 

// Class PageInfo : $title $user(db user)

// Contenu à afficher 

    

// Appeler le layout html

$title = ':: FUTUR :: 4044 ::';



ob_start();




// Banière d'info 


echo '<div class="main__bann">';

if(isset($_SESSION['name']))
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'] === 1)
    {
        echo 'Enregistrement réussi :: Hello ' . $_SESSION['name'] . ' ::';
        $_SESSION['valid'] = 0;
        if(isset($_SESSION['error']))
        {
            echo '<br/>:: Votre date de naissance m\'indique que ' . $_SESSION['error'];
            unset($_SESSION['error']);
        }
    }
    else
    {
        echo ':: Bonjour ' . $_SESSION['name'] . ' ::';
    }
}
else
{
    if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        else
        {
            echo ':: Bonjour à vous, humain ::';
        }
    
}

echo '</div>';






//Articles


echo '<ul>';

foreach($Posts->posts as $post)
{
    echo '<div class="main__posts"><li><h2><a href="/?id=' . $post->id . '">' . $post->title . '</h2></a><br/>' . $post->content . '</li></div>';
}

echo '</ul>';


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');

