<?php
// redirection si aucune session n'existe
if ( empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}

// connection à la BDD
$pdo = connect_db();

// récupération de l'id de l'utilisateur
$user_id = $_GET['id'];

// instanciation des managers de groupes et de chansons
$bandManager = new \Models\Profile\BandsManager($pdo);
$songManager = new \Models\Profile\SongsManager($pdo);

// récupération des groupes selon l'id de l'utilisateur
$userBands = $bandManager->selectUserBands($user_id);

// require view
require realpath('SRC/views/profile.php');

?>