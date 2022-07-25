<?php

/* 

Affiche le formulaire 

*/

$title = 'Nouvel article :: FUTUR :: 4044';

ob_start(); 

if(isset($_SESSION['error']))
{
    echo '<div class="main__bann">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}

?>

<form method="post" action="<?php $controlsDirectory . 'new_post.php' ?>" enctype="multipart/form-data">

        <label for="title">Titre </label>  <input type="text" name="title" id="title" required autofocus/>

        <label for="category">Catégorie</label>
        <select name="category" id="category">
            <option value="1" selected>Technologie</option>
            <option value="3">Biologie</option>
            <option value="4">Environnement</option>
            <option value="5">Economie</option>
            <option value="6">Géopolitique</option>
            <option value="9">Urbanisme & Transport</option>
        </select>

        <label for="content">Article</label>  <textarea name="content" id="content" required> Article ... </textarea>

        <label for="projection">Horizon</label>  <input type="number" name="projection" id="projection" required/>

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img">Image</label> <input type="file" name="img" id="img">

        <input class="btn--form" type="submit" value="C'est partiii 😃" !/>

</form>


<?php
$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';