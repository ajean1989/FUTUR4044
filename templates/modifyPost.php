<?php

$title = 'Modifier : ' . $Post->title . ' :: FUTUR :: 4044 ::';



ob_start(); 

if(isset($_SESSION['error']))
{
    echo '<div class="main__bann">';
    echo $_SESSION['error'];
    echo '</div>';
    unset($_SESSION['error']);
}

?>

<form method="post" action="<?php $controlsDirectory . 'modifyPost.php' ?>" enctype="multipart/form-data">

        <label for="title">Titre </label>  <input type="text" name="title" id="title" value="<?= $Post->title ?>" required autofocus/>

        <label for="category">Catégorie</label>
        <select name="category" id="category">
            <option value="<?= $Post->category_id ?>" selected><?= $Category->name ?></option>
            <option value="1">Technologie</option>
            <option value="3">Biologie</option>
            <option value="4">Environnement</option>
            <option value="5">Economie</option>
            <option value="6">Géopolitique</option>
            <option value="9">Urbanisme & Transport</option>
        </select>

        <label for="projection">Horizon</label>  <input type="number" name="projection" id="projection" value="<?= $Post->projection ?>" required/>

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img">Image</label> <input type="file" name="img" id="img" required/>

        <label for="content">Article</label>  <textarea name="content" id="content" required>
        <?= $Post->content ?>

        </textarea>

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img1">Illustration 1</label> <input type="file" name="img1" value=".images/posts/<?= $Post->id ?>/img_1" id="img1">

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img2">Illustration 2</label> <input type="file" name="img2" id="img2">

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img3">Illustration 3</label> <input type="file" name="img3" id="img3">

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img4">Illustration 4</label> <input type="file" name="img4" id="img4">

        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="img5">Illustration 5</label> <input type="file" name="img5" id="img5">


        

        <input class="btn--form" type="submit" value="C'est partiii 😃" !/>

</form>

<?php


$content = ob_get_clean();

require_once($layoutsDirectory . 'html.php');


