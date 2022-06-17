<?php
// redirection si aucune session n'existe
if (empty($_SESSION) || !isset($_SESSION['logged_in'])){
    header('location: /?page=login');
    exit();
}

// connection à la BDD
$pdo = connect_db();

// récupération de l'id de l'utilisateur
$user_id = $_GET['id'];

// instanciation d'un nouveau manager d'utilisateurs
$userManager = new \Models\Authentification\UsersManager($pdo);

// récupération de l'utilisateur stocké en BDD grâce à son id
$user = $userManager->selectUser($user_id);

// si le formulaire est soumis
if(isset($_POST['submit'])){

    // sécurisation des inputs grâce à la fonction test_input
    $nickname = test_input($_POST['nickname']);
    $email = test_input($_POST['email']);

    // update des données de l'utilisateur en BDD
    $userManager->updateUser($user_id, $nickname, $email);

    // update de la session
    $_SESSION['nickname'] = $nickname;
    $_SESSION['email'] = $email;

    // redirection vers la page de profil
    header("location: /?page=profile&id={$user_id}");
    exit();
}

// si le formulaire de changement de mot de passe est soumis
if(isset($_POST['save_password'])){

    // si l'input n'est pas vide
    if(!empty($_POST['new_password'])){
        
        // sécurisation de l'input grâce à la fonction test_input
        $new_pwd = test_input($_POST['new_password']);
        
        // variable pour stocker les éventuelles erreurs
        $alert = "";
        
        // hash du nouveau mot de passe
        $new_hash = password_hash($new_pwd, PASSWORD_DEFAULT);

        // update du mot de passe en BDD
        $userManager->updatePassword($user_id, $new_hash);

        // redirection vers la page de profil
        header("location: /?page=profile&id={$user_id}");
        exit();
            
    } else {

        // erreur l'input est vide
        $alert = 1;
        return $alert;
    }
    
}
// require view*****
require realpath('SRC/views/user_settings.php');

?>