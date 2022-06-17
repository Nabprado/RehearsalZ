<?php


/**
 * ClassCaller
 * permet de require les classes selon le besoin de la page
 * @param  mixed $className
 * @return string
 */
function ClassCaller($className){
    $parts = explode('\\', $className);
    require end($parts) . '.php';
}

spl_autoload_register('ClassCaller');

?>