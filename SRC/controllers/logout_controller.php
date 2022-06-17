<?php

// si le formulaire de déconnexion est soumis
if(isset($_POST['submit'])){
    
    // destruction de session
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['nickname']);
    unset($_SESSION['email']);
    unset($_SESSION['logged_in']);

    // redirection vers la page d'accueil
    header('location: /?page=home');
    exit();

};

// require view
require realpath('SRC/views/logout.php');

?>