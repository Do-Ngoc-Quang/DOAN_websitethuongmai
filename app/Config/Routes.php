<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\UserController;

use App\Controllers\CategoryController;
use App\Controllers\ProductController;

use App\Controllers\DashboardController;



/**
 * @var RouteCollection $routes
 */

//Admin -------------------------------------------------------------------------//
$routes->get('admin/login', [UserController::class, 'index_login']);
$routes->post('admin/login', [UserController::class, 'authentication']);
$routes->post('admin/logout', [UserController::class, 'logout']);
$routes->get('admin/register', [UserController::class, 'index_register']);
$routes->post('admin/register', [UserController::class, 'create']);

//Dashboard
$routes->get('admin/dashboard', [DashboardController::class, 'index']);

//Category
$routes->get('admin/category', [CategoryController::class, 'index']); 
$routes->post('admin/category', [CategoryController::class, 'create']);
$routes->post('admin/category/update/(:num)',  'CategoryController::update/$1');
$routes->post('admin/category/delete/(:num)', 'CategoryController::delete/$1');

//Product
$routes->get('admin/product', [ProductController::class, 'index']); 
$routes->post('admin/product', [ProductController::class, 'create']);
// $routes->post('admin/category/update/(:num)',  'CategoryController::update/$1');
$routes->post('admin/product/delete/(:num)', 'ProductController::delete/$1');

//Iphones
// $routes->get('admin/iphones', [Category::class, 'index']); 
// $routes->post('admin/category', [Category::class, 'create']);
// $routes->post('admin/category/update/(:num)',  'Category::update/$1');
// $routes->post('admin/category/delete/(:num)', 'Category::delete/$1');

//Account
$routes->get('admin/account', [UserController::class, 'view']); 
$routes->post('admin/account/update/(:num)',  'UserController::update/$1');
//Admin -------------------------------------------------------------------------//


//Client -------------------------------------------------------------------------//
$routes->get('/', [UserController::class, 'index_login']);
//Client -------------------------------------------------------------------------//