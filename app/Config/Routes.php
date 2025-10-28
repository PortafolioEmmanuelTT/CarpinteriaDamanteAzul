<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');

//Vista productos
$routes->get('/productos', 'ProductosController::index');

//Vista dashboard
$routes->get('/dashboard', 'DashboardController::index');

//Vista perfil
$routes->get('/perfil', 'PerfilController::index');
