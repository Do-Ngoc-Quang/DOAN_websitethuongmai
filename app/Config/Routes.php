<?php


use CodeIgniter\Router\RouteCollection;

use App\Controllers\UserController;
use App\Controllers\DashboardController;
use App\Controllers\CategoryController;
use App\Controllers\BlogController;
use App\Controllers\ProductController;
use App\Controllers\ContactController;
use App\Controllers\OrderController;
use App\Controllers\AboutController;

use App\Controllers\ClientController;

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

//Blog
$routes->get('admin/blog', [BlogController::class, 'index']); 
$routes->post('admin/blog', [BlogController::class, 'create']);
$routes->post('admin/blog/update/(:num)',  'BlogController::update/$1');
$routes->post('admin/blog/delete/(:num)', 'BlogController::delete/$1');

//Product
$routes->get('admin/product', [ProductController::class, 'index']); 
$routes->post('admin/product', [ProductController::class, 'create']);
$routes->post('admin/product/update/(:num)',  'ProductController::update/$1');
$routes->post('admin/product/delete/(:num)', 'ProductController::delete/$1');

//Product-type
$routes->get('admin/product_type/(:any)', 'ProductController::product_type/$1');

//Contact
$routes->get('admin/contact', [ContactController::class, 'index']); 
$routes->post('admin/contact/handle_status/(:num)', 'ContactController::handle_status/$1');

//Order
$routes->get('admin/order', [OrderController::class, 'index']); 
$routes->post('admin/order/handle_status/(:num)', 'OrderController::handle_status/$1');

//About
$routes->get('admin/about', [AboutController::class, 'index']); 
$routes->post('admin/about', [AboutController::class, 'create']);
$routes->post('admin/about/update/(:num)',  'AboutController::update/$1');
$routes->post('admin/about/delete/(:num)', 'AboutController::delete/$1');

//Account
$routes->get('admin/account', [UserController::class, 'view']); 
$routes->post('admin/account/update/(:num)',  'UserController::update/$1');

//Admin -------------------------------------------------------------------------//


//Client -------------------------------------------------------------------------//
$routes->get('/', [ClientController::class, 'home_c']);

$routes->get('/product_c', [ClientController::class, 'product_c']);
$routes->get('/product_detail_c/(:any)', 'ClientController::product_detail_c/$1');
$routes->post('/product_detail_c/review', [ClientController::class, 'review']);

// Add to cart
$routes->post('/add_to_cart', [ClientController::class, 'add_to_cart']);

// Cart
$routes->get('/shoping_cart_c', [ClientController::class, 'shoping_cart_c']);
$routes->post('shoping_cart_c/update_cart_c/(:num)',  'ClientController::update_cart_c/$1');
$routes->post('shoping_cart_c/delete_cart_c/(:num)',  'ClientController::delete_cart_c/$1');

// Order    
$routes->post('shoping_cart_c/order', [ClientController::class, 'order']);

// Blog
$routes->get('/blog_c', [ClientController::class, 'blog_c']);
$routes->get('/blog_detail_c/(:num)', 'ClientController::blog_detail_c/$1');
$routes->post('/blog_detail_c/comment', [ClientController::class, 'comment']);

// About
$routes->get('/about_c', [ClientController::class, 'about_c']);

// Contact
$routes->get('/contact_c', [ClientController::class, 'contact_c']);
$routes->post('/contact_c', [ClientController::class, 'send_contact_c']);
//Client -------------------------------------------------------------------------//