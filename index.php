<?php
require 'lib/Router.php';

// Crear instancia del Router
$router = new Router();

// Definir rutas simples
$router->add('/programa-gestion-proyectos/', 'InicioController@index');
// Procesar la ruta actual

$router->dispatch($_SERVER['REQUEST_URI']);

?>