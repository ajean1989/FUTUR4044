<?php

// Model pour se connecter à la base de donnée 

// Décalaration de variables globales 

$pdo;


// Fontion de connexion à la db    // Voir pour faire une Class avec toutes les méthodes relatives à la db

function dbConnexion() {

try
    {
        global $pdo;
        
        $pdo = new PDO('mysql:host=localhost;dbname=planete_futur;charset=utf8;port=3306',
                        'root',
                        'adr13NjMy',
                        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                    );
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

}

    