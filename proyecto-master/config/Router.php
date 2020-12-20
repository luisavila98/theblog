<?php

require_once 'model/database.php';

$controller = 'BlogController';

//Acción por defecto
if(!isset($_REQUEST['c']))
{
    require_once "controller/".$controller.".php";
    $controller = ucwords($controller);
    $controller = new $controller;
    $controller->Index();
}
else
{
    // Obtenemos el controlador a cargar
    $controller = $_REQUEST['c'];
    $controller = $controller.'Controller';
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Se instancia el controlador
    require_once "controller/".$controller.".php";
    $controller = ucwords($controller);
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}