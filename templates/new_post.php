<?php

/* 

Affiche le formulaire 

*/

$title = 'Nouvel article :: FUTUR :: 4044';

ob_start(); ?>



<form method="post" action="<?php $controlsDirectory . 'new_post.php' ?>">
    <p>
        <label for="title">Titre </label>  <input type="text" name="title" id="title" required autofocus/>
    </p>
    <p>
        <label for="category">Catégorie</label>
        <select name="category" id="category">
            <option value="1" selected>Technologie</option>
            <option value="3">Biologie</option>
            <option value="4">Environnement</option>
            <option value="5">Economie</option>
            <option value="6">Géopolitique</option>
            <option value="9">Urbanisme & Transport</option>
        </select>
    </p>
    <p>
        <label for="content">Article</label>  <textarea name="content" id="content" required> Article ... </textarea>
    </p>
    <p>
        <label for="projection">Horizon</label>  <input type="number" name="projection" id="projection" required/>
    </p>
    <p>
        <input class="btn--form" type="submit"/>
    </p>
</form>

<?php
$content=ob_get_clean();

require_once $layoutsDirectory . 'html.php';