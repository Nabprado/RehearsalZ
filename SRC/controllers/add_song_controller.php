<?php
// redirection si aucune session n'existe
if ( empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}


// connection à la BDD
$pdo = connect_db();

// instanciation du manager de groupes
$songManager = new \Models\Profile\SongsManager($pdo);

// si le formulaire est soumis
if(isset($_POST['submit'])){
    
    $song_name = test_input($_POST['song_name']);
    $band_id = $_GET['band_id'];
    
    // insertion de la chanson en BDD
    $songManager->insert($band_id, $song_name);

    //récupération de la chanson en BDD pour avoir accès à son id
    $song = $songManager->selectByName($song_name, $band_id);
    

    // insertion de la piste audio en BDD
if($_FILES['drums']['size'] !== 0):
        $track1_type = "Drums";
        foreach($song as $s){
            $song_id = $s->id;
        };
        
        // récupération de l'extension
        $type = explode('/', $_FILES['drums']['type']);
        $ext = end($type);
        // création du nom
        $filename = $song_name.'-'.$track1_type.'.'.$ext;
        $uploads_dir = realpath('PUBLIC/assets/audio/$filename');
        // déplacement fichier du dossier temporaire au dossier de l'app
        $path = "C:\laragon\www\REHEARSALZOK\PUBLIC\assets\audio/$filename";
        move_uploaded_file($_FILES['drums']['tmp_name'], $path);

        // insertion de la piste en BDD avec modification du chemin d'accès à la piste
        $trackManager = new \Models\Profile\TracksManager($pdo);
        $new_path = explode("\\", $path);
        $newPath = $new_path[4].'/'.$new_path[5].'/'.$new_path[6];
        $trackManager->insert($song_id, $track1_type, $newPath);
endif;
if($_FILES['guitars']['size'] !== 0):
        $track2_type = "Guitars";
        foreach($song as $s){
            $song_id = $s->id;
        };
        
        // récupération de l'extension
        $type = explode('/', $_FILES['guitars']['type']);
        $ext = end($type);
        // création du nom
        $filename = $song_name.'-'.$track2_type.'.'.$ext;
        $uploads_dir = realpath('PUBLIC/assets/audio/$filename');
        // déplacement fichier du dossier temporaire au dossier de l'app
        $path = "C:\laragon\www\REHEARSALZOK\PUBLIC\assets\audio/$filename";
        print_r($_FILES['track2']['tmp_name']);
        move_uploaded_file($_FILES['guitars']['tmp_name'], $path);
        // insertion de la piste en BDD avec modification du chemin d'accès à la piste
        $trackManager = new \Models\Profile\TracksManager($pdo);
        $new_path = explode("\\", $path);
        $newPath = $new_path[4].'/'.$new_path[5].'/'.$new_path[6];
        $trackManager->insert($song_id, $track2_type, $newPath);
endif;
if($_FILES['voices']['size'] !== 0):
        $track3_type = "Voices";
        foreach($song as $s){
            $song_id = $s->id;
        };
        
        // récupération de l'extension
        $type = explode('/', $_FILES['voices']['type']);
        $ext = end($type);
        // création du nom
        $filename = $song_name.'-'.$track3_type.'.'.$ext;
        $uploads_dir = realpath('PUBLIC/assets/audio/$filename');
        // déplacement fichier du dossier temporaire au dossier de l'app
        $path = "C:\laragon\www\REHEARSALZOK\PUBLIC\assets\audio/$filename";
        print_r($_FILES['track3']['tmp_name']);
        move_uploaded_file($_FILES['voices']['tmp_name'], $path);

        // insertion de la piste en BDD avec modification du chemin d'accès à la piste
        $trackManager = new \Models\Profile\TracksManager($pdo);
        $new_path = explode("\\", $path);
        $newPath = $new_path[4].'/'.$new_path[5].'/'.$new_path[6];
        $trackManager->insert($song_id, $track3_type, $newPath);
endif;
        // redirection vers la page de profil
        header('location: /?page=band&id='.$band_id);
        die();

}

// require view
require realpath('SRC/views/add_song.php');

?>