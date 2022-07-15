<?php 

/*

Utilise la Class Db pour se connecter à la db et va chercher les infos pour la page main, à savoir :
- La liste des articles complet
- La liste des catégories

ou 

- La catégorie selectionnée
- La liste d'articles associée


*/

declare(strict_types=1);

$Db = new Db;

$Db->getUsers('*');

$Db->getPosts('*');