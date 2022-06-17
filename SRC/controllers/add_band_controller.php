<?php
// redirection si aucune session n'existe
if ( empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}

// connection à la BDD
$pdo = connect_db();

// instanciation du manager de groupes
$bandManager = new \Models\Profile\BandsManager($pdo);

// si le formulaire est soumis
if(isset($_POST['submit'])){
    
    $band_name = test_input($_POST['band_name']);
    $picture = "PUBLIC/assets/icons8-star-48.png";
    $userId = $_SESSION['id'];

    // insertion du groupe en BDD
    $bandManager->insert($band_name, $picture, $userId);

    // redirection vers la page de profil
    $path = "/?page=profile&id=".$_SESSION['id'];
    header("location: $path");
    exit();
}

// require view
require realpath('SRC/views/add_band.php');

?>