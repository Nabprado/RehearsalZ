<?php
// require du tableau associatif des routes disponibles pour pouvoir y accéder dans la fonction getRoute.
require_once realpath("SRC/config/settings.php");


// ROUTER*********************************

function getRoute(): string {
    
// On défini le dossier où se trouvent les controllers (qui chargeront à leur tour les views).
    $defaultControllerPath = 'SRC/controllers/';

// On défini les routes possibles, grâce au tableau associatif dans settings.php
//qui a pour valeurs le controller correspondant à chaque clé.
    $routesName =  array_keys(AVAILABLE_ROUTES);

// On défini un chemin par défaut.
    $path = realpath($defaultControllerPath . AVAILABLE_ROUTES["home"]);

// S'il y a un paramètre "page" dans l'url, on modifie le chemin pour qu'il charge
// le controller correspondant, grâce au tableau associatif dans settings.php
    if (isset($_GET["page"]) && in_array($_GET["page"], $routesName, true)) {
        $path = realpath($defaultControllerPath . AVAILABLE_ROUTES[$_GET["page"]]) ;
    }

// On retourne le chemin.
    return $path;
};

?>