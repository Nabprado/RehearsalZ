<?php

// On défini les constantes pour la connexion à la Base de données.
const DB_HOST = "localhost";
const DB_NAME = "db_rehearsalz";
const DB_USER = "root";
const DB_PWD = "";


// On retourne une nouvelle instanciation de PDO grâce à la fonction connect_db.
function connect_db(){
    try {
        return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);
    } catch(Exception $e) {
        echo "Impossible d'accéder à la base de données MySQL : ".$e->getMessage();
        die();
    };
};