<?php
require 'lib/Router.php';

// Crear instancia del Router
$router = new Router();

// Definir rutas simples
$router->add('/daw_servidor/forms/index.php', 'InicioController@index');
$router->add('/daw_servidor/forms/procesarDatos', 'InicioController@procesarDatos');
// Procesar la ruta actual

$router->dispatch($_SERVER['REQUEST_URI']);

?>