<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Reemplaza todas las rutas
 //La ruta resource, se llama products y va a usar todos los métodos excepto new y edit
 //Va a utilizar el controlador que se llama Products, se puede cambiar
 $routes->get('/', 'Home::index');
 $routes->resource('products', ['except' => 'new,edit', 'controller' => 'Products']);

/*
$routes->get('/products', 'Products::index');
$routes->get('/products/(:num)', 'Products::show/$1');
$routes->post('/products', 'Products::create');
$routes->patch('/products/(:num)', 'Products::update/$1');
$routes->delete('/products/(:num)', 'Products::delete/$1');

*/