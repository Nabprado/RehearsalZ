<?php

// DOCUMENT TITLE*******************************************

function get_title(): string{

    if($_GET['page'] === 'home'): 
        return $titre = "Home";
        
    elseif($_GET['page'] === 'register'):
        return $titre = "Sign up";

    elseif($_GET['page'] === 'login'):
        return $titre = "Login";

    elseif($_GET['page'] === 'about'):
        return $titre = "About us";

    elseif($_GET['page'] === 'contact' || $_GET['page'] === 'thank_you'):
        return $titre = "Contact us";

    elseif($_GET['page'] === 'profile' || $_GET['page'] === 'logout' || $_GET['page'] === 'band' || $_GET['page'] === 'song' || $_GET['page'] === 'edit_band' || $_GET['page'] === 'add_band' || $_GET['page'] === 'add_song'):
        return $titre = "My profile";

    elseif($_GET['page'] === 'user_settings'):
        return $titre = "Profile settings";

    endif;
};

// NAVBAR ITEMS ***********************************************************

function nav_item(string $page_url, string $title): void {

    // instanciation d'un nouvel objet DOMDocument
    $doc = new DOMDocument();

    // si le nom de la page actuelle et l'url sont identiques (si l'on se trouve sur cette page)
    if($_SERVER["SCRIPT_NAME"] === $page_url):

        // lien vers la page avec la class active
        $doc-> loadHTML("<a href='".$page_url."' class='active'><li>".$title."</li></a>");
        echo $doc->saveHTML();

    else:
        // lien vers la page sans la class active
        $doc-> loadHTML("<a href='".$page_url."'><li>".$title."</li></a>");
        echo $doc->saveHTML();
    
    endif;
};

// GENERALITIES*******************************************

// sécurisation des inputs remplis par l'utilisateur
function test_input($data) {
    
    if(isset($data)){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    return null;
}

?>