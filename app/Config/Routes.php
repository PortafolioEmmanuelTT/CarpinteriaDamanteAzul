<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'DashboardController::index');

//Vista clientes
$routes->get('/clientes', 'ClientesController::index');
$routes->post('/clientes/(:num)/delete', 'ClientesController::delete/$1');
$routes->post('/clientes/(:num)/update', 'ClientesController::update/$1');
$routes->post('/clientes/add', 'ClientesController::add');

//Vista dashboard
$routes->get('/dashboard', 'DashboardController::index');

//Vista materiales
$routes->get('/materiales', 'MaterialesController::index');

//Vista pedidos
$routes->get('/pedidos', 'PedidosController::index');

//Vista finanzas
$routes->get('/finanzas', 'MovimientosFinancierosController::index');

//Vista pedidos_material
$routes->get('/pedidos_material', 'PedidoMaterialController::index');

$routes->get('testenv', 'TestENV::index');

$routes->get('/perfil', 'UsuarioController::index');
