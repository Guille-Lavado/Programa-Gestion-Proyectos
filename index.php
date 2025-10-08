<?php
require 'lib/Router.php';

// Crear instancia del Router
$router = new Router();

// Definir rutas simples
$router->add('/Programa-Gestion-Proyectos/', 'InicioController@index');
$router->add('/Programa-Gestion-Proyectos/procesarDatos', 'InicioController@procesarDatos');
// Procesar la ruta actual

$router->dispatch($_SERVER['REQUEST_URI']);

?>