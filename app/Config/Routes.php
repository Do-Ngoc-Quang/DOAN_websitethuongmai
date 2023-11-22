<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Category;
use App\Controllers\UserController;
use App\Controllers\DashboardController;


/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

//Admin -------------------------------------------------------------------------//
$routes->get('admin/login', [UserController::class, 'index_login']);
$routes->post('admin/login', [UserController::class, 'check_login']);
$routes->post('admin/logout', [UserController::class, 'logout']);
$routes->get('admin/register', [UserController::class, 'index_register']);
$routes->post('admin/register', [UserController::class, 'create']);

//Dashboard
$routes->get('admin/dashboard', [DashboardController::class, 'index']);

//Category
$routes->get('admin/category', [Category::class, 'index']); 
$routes->post('admin/category', [Category::class, 'create']);
$routes->post('admin/category/update/(:num)',  'Category::update/$1');
$routes->post('admin/category/delete/(:num)', 'Category::delete/$1');

//Account
$routes->get('admin/account', [UserController::class, 'view']); 
$routes->post('admin/account/update/(:num)',  'UserController::update/$1');