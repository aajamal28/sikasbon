<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/home', 'Home::index', ['filter' => 'auth']);
$routes->post('/auth/verify', 'AuthController::auth');
$routes->get('/auth/logout', 'AuthController::logout');

//custom routes
$routes->group('master', ['filter' => 'auth'] ,function ($routes) {
    $routes->group('user', function ($routes) {
        $routes->add('list', 'Master\UserController::index');
        $routes->add('register', 'Master\UserController::register');
        $routes->add('/(segment)', 'Master\UserController::detail/$1');
        $routes->post('save', 'Master\UserController::save');
    });
});

$routes->group('transaction', ['filter' => 'auth'] ,function ($routes) {
    $routes->add('overview', 'Transaction\TransactionController::index');
    $routes->add('request/(:segment)', 'Transaction\RequestController::detail/$1');
    $routes->add('request/paid/(:segment)', 'Transaction\RequestController::paid/$1');
    $routes->add('request/(:segment)/(:segment)', 'Transaction\RequestController::approve/$1/$2');
    

    $routes->group('request', function ($routes) {
        $routes->add('/', 'Transaction\RequestController::index');
        $routes->post('save', 'Transaction\RequestController::post');
        $routes->post('process', 'Transaction\RequestController::process_approval');
        $routes->post('paidprocess', 'Transaction\RequestController::process_paid');
    });

    $routes->group('refund', function ($routes) {
        $routes->add('/', 'Transaction\RefundController::index');
        $routes->add('/(:segment)/approve', 'Transaction\RefundController::detail/$1');
        $routes->post('save', 'Transaction\RefundController::post');
    });
});

$routes->group('report', ['filter' => 'auth'] ,function ($routes) {
    $routes->add('cash', 'Report\ReportController::showSaldo');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
