<?php

// connection à la BDD
$pdo = connect_db();

// instanciation du manager des utilisateurs
$manager = new \Models\Authentification\UsersManager($pdo);


if(isset($_POST['email'])){

    // sécurisation des inputs grâce à la fonction test_input
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    // variable pour récupérer les éventuelles erreurs
    $alert = "";

    require realpath('SRC/views/login.php');

    // si les inputs ne sont pas vides
    if(!empty($email) && !empty($password)){

        // si l'email est valide
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // récupération de l'utilisateur en BDD grâce à l'email
            $user = $manager->selectUserByEmail($email);
            
            // si l'utilisateur existe bien en BDD
            if(!empty($user)){
                
                // instanciation d'un nouvel utilisateur
                $currentUser = new \Models\Authentification\Users([
                    'nickname' => $user->nickname,
                    'email' => $user->email,
                    'password' => $user->password,
                    'id' => $user->id
                ]);
                        
                        
                // si le mot de passe correspond bien à celui de l'utilisateur en BDD
                if(password_verify($password, $currentUser->getPassword())){

                    // ouverture de session
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['id'] = $currentUser->getId();
                    $_SESSION['nickname'] = $currentUser->getNickname();
                    $_SESSION['email'] = $currentUser->getEmail();

                    // redirection vers la page de profil de l'utilisateur
                    $path = "/?page=profile&id=".$_SESSION['id'];
                    header('location: '.$path);
                    exit();
                } else {

                    // erreur mot de passe incorrect
                    $alert = 1;
                    return $alert;
                }       
            } else {

                // erreur l'utilisateur n'existe pas en BDD
                $alert = 2;
                return $alert;
            }
        } else {

            // erreur l'email n'est pas valide
            $alert = 3;
            return $alert;     
        }
    } else {

        // erreur les inputs sont vides
        $alert = 4;
        return $alert; 
    }
} else {
    
    // require view*****
    require_once realpath('SRC/views/login.php');
}

?>