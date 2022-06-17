<?php
// redirection si aucune session n'existe
if ( empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}

// connection à la BDD
$pdo = connect_db();

// récupération de l'id du groupe
$band_id = $_GET['id'];

// instanciation du manager de groupes
$bandManager = new \Models\Profile\BandsManager($pdo);

// récupération du groupe selon l'id
$band = $bandManager->select($band_id);

foreach($band as $b){
    $this_band = new \Models\Profile\Bands([
        'id' => $b->id,
        'name' => $b->name
    ]);
}


if(isset($_POST['update'])){

    $band_name = test_input($_POST['band_name']);
    
    $bandManager->updateBand($band_id, $band_name);

    $path = '/?page=profile&id='.$_SESSION['id'];
    header("location: $path");
    exit();
}

if(isset($_POST['delete'])){

    $bandManager->deleteBand($band_id);
    
    $path = '/?page=profile&id='.$_SESSION['id'];
    header("location: $path");
    exit();
}

// require view
require realpath('SRC/views/edit_band.php');

?>