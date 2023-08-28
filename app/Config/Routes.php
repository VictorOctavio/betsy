<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();


// Admin routes
$routes->group('admin', ['filter' => 'isAdmin'], static function ($routes) {

    // Get
    $routes->get('', 'Admin::dashboardAdmin');
    $routes->get('messages', 'Admin::messagesAdmin');
    $routes->get('new-product', 'Admin::newProductAdmin');
    $routes->get('products', 'Admin::productsAdmin');
    $routes->get('users', 'Admin::usersAdmin');
    $routes->get('buy/(:num)', 'Admin::listBuyUserAdmin/$1');
    $routes->get('products/(:num)', 'Admin::editProductAdmin/$1');
    $routes->get('buy/changeStateReceived/(:num)', 'Admin::changeStateReceived/$1');

    
    // Post
    $routes->post('new-product', 'ProductController::createProduct');
    $routes->post('edit-product/(:num)', 'Admin::sendEditProductAdmin/$1');
    $routes->get('isEnabled-product/(:num)', 'Admin::isEnableProductAdmin/$1');
    
    
    // Delete
    $routes->get('change-state-block/(:num)', 'Admin::changeUserStateBlock/$1');
    $routes->get('delete-product/(:num)', 'Admin::sendRemoveProductAdmin/$1');
    $routes->get('change-state-rol/(:num)', 'Admin::changeUserStateRol/$1');

});

// User pages
$routes->group('user', ['filter' => 'auth'], static function ($routes) {

    // Get
    $routes->get('', 'UserController::myAccount');
    $routes->get('messages', 'UserController::myMessages');
    $routes->get('my-cart', 'CartController::cartList');

    // Cart
    $routes->post('add-cart', 'CartController::addShoe');
    $routes->get('remove-cart', 'CartController::removeCart');
    $routes->get('remove-item-cart/(:any)', 'CartController::removeItemCart/$1');
    $routes->get('buy-cart', 'CartController::buyCart');
    $routes->get('update-cart', 'CartController::updateCart');
    
    // CartGet
    $routes->get('my-buys', 'CartController::myBuysList');
    $routes->get('invoice/(:num)', 'CartController::downloadFactura/$1');

    // Commment
    $routes->post('comment/(:num)', 'ProductController::saveCommentShoe/$1');
    $routes->get('remove-comment/(:num)', 'ProductController::removeCommentShoe/$1');

    // Questions
    $routes->post('update-questions', 'UserController::updateQuestionsSeguridad');

    // Put
    $routes->post('update-user', 'UserController::updateUser');

});


// main controller
$routes->get('/', 'Main::home');
$routes->get('/terminosycondiciones', 'Main::terminosCondiciones');
$routes->get('/preguntasfrecuentes', 'Main::questions');
$routes->get('/products', 'Main::products');
$routes->get('/products/(:num)', 'Main::product/$1');
$routes->get('/nosotros', 'Main::nosotros');
$routes->get('/micarrito', 'Main::micarrito');

// user controller
$routes->get('/signup', 'UserController::create');
$routes->get('/signin', 'UserController::signin');
$routes->get('/logout', 'UserController::logout');
$routes->get('/restore-password', 'UserController::restorePassword');

// Post
$routes->post('/signup-send', 'UserController::formValidation');
$routes->post('/signin-send', 'UserController::signinSubmit');
$routes->post('/send-email', 'UserController::sendEmail');
$routes->post('/read-msg/(:num)', 'UserController::readMessage/$1');
$routes->post('/restore-password', 'UserController::sendRestorePassword');

// 404 Not Found
$routes->set404Override(function(){
    return view('front/pages/NotFound404');
});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
