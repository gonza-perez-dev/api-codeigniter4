<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// 1. Ruta para la API RESTful (para usar en Postman bajo la URL: /api/producto)
$routes->resource('api/producto', ['controller' => 'Api\Producto']);

// 2. Rutas para la interfaz web tradicional (HTML en el navegador bajo la URL: /producto)
// ¡Ojo aquí! Apuntan a 'Producto' (la web), no a 'Api\Producto'
$routes->get('producto', 'Producto::index');
$routes->get('producto/crear', 'Producto::crear');
$routes->post('producto/guardar', 'Producto::guardar');
$routes->get('producto/editar/(:num)', 'Producto::editar/$1');
$routes->post('producto/actualizar/(:num)', 'Producto::actualizar/$1');
$routes->post('producto/eliminar/(:num)', 'Producto::eliminar/$1');