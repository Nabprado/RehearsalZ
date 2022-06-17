<?php
//condition logged in, sinon header home
if ( empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}

// connection à la BDD
$pdo = connect_db();

// instanciation du manager des chansons
$songManager = new \Models\Profile\SongsManager($pdo);

// récupération de l'id du groupe correspondant
$band_id = $_GET['id'];

// récupération des chansons du groupe correspondant
$songs = $songManager->selectByBandId($band_id);


// require view
require realpath('SRC/views/band.php');
?>