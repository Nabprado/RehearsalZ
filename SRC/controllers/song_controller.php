<?php
// redirection si aucune session n'existe
if (empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}

// connection à la BDD
$pdo = connect_db();

// récupération de l'id de la chanson
$song_id = $_GET['id'];

// instanciation d'un nouveau manager de chansons
$songManager = new \Models\Profile\SongsManager($pdo);

// récupération des pistes en BDD grâce à l'id de la chanson
$song = $songManager->selectById($song_id);

foreach($song as $s){
    $trackManager = new \Models\Profile\TracksManager($pdo);
    $tracks = $trackManager->selectBySongId($s->id);
}

// require view
require realpath('SRC/views/song.php');

?>