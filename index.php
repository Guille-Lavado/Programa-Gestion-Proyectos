<?php
require 'lib/Router.php';

$route = explode($_SERVER["DOCUMENT_ROOT"], str_replace("\\", "/", __DIR__))[1];

// Crear instancia del Router
$router = new Router();

// Definir rutas simples
$router->add($route."/", 'InicioController@index');
// Procesar la ruta actual

$router->dispatch($_SERVER['REQUEST_URI']);
?>