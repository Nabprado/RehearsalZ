<?php

// connection à la BDD
$pdo = connect_db();

// instanciation d'un nouveau manager d'utilisateurs
$manager = new \Models\Authentification\UsersManager($pdo);


if(isset($_POST['nickname'])){

    // sécurisation des inputs grâce à la fonction test_input
    $nickname = test_input($_POST['nickname']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $r_password = test_input($_POST['r_password']);

    // variable pour stocker les éventuelles erreurs
    $alert = "";

    // si les inputs ne sont pas vides
    if(!empty($nickname && $email && $password && $r_password)){

        // si l'email est valide
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // si les mots de passe sont identiques
            if($password === $r_password){
                
                // instanciation d'un nouvel objet utilisateur
                $user = new \Models\Authentification\Users([
                'nickname' => $_POST['nickname'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
                
                // récupération des éventuelles erreurs lors de l'instanciation du nouvel utilisateur
                $errors = $user->getErrors();
            
                require_once realpath('SRC/views/register.php');
            
                // s'il n'y a pas d'erreurs et que l'utilisateur est valide
                if($user->isUserValid() && empty($errors)){
                    
                    // récupération en BDD de l'utilisateur grâce à l'email pour vérifier qu'il n'existe pas déjà
                    $userExists = $manager->selectUserByEmail($user->getEmail());
                    
                    // s'il n'existe pas déjà
                    if(empty($userExists)){
                        
                        // insertion en BDD
                        $manager->insert($user);

                        // redirection vers la page de login
                        header('location: /?page=login');
                        exit();
                        
                    } else {

                        // erreur l'utilisateur existe déjà
                        $alert = 1;
                        return $alert;
                    }
                } else {

                    // erreur lors de la création de l'objet user
                    $alert = 2;
                    return $alert;
                }
            }
        }
    }
    
    
} else {
    // require view*****
    require_once realpath('SRC/views/register.php');
}

?>