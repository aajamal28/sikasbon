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
$routes->setDefaultController('Auth');
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
$routes->get('/home', 'Home::index');

//custom routes
$routes->group('master', function ($routes) {
    $routes->group('item', function ($routes) {
        $routes->add('list', 'Master\Item::index');
        $routes->add('add', 'Master\Item::add');
        $routes->add('/(segment)', 'Master\Item::detail/$1');
        $routes->post('save', 'Master\Item::save');
    });
});

$routes->group('transaction', function ($routes) {
    $routes->add('overview', 'Transaction\TransactionController::index');

    $routes->group('request', function ($routes) {
        $routes->add('/', 'Transaction\RequestController::index');
        $routes->add('/(segment)', 'Transaction\RequestController::detail/$1');
        $routes->post('save', 'Transaction\RequestController::post');
    });

    $routes->group('refund', function ($routes) {
        $routes->add('/', 'Transaction\RefundController::index');
        $routes->add('/(segment)', 'Transaction\RefundController::detail/$1');
        $routes->post('save', 'Transaction\RefundController::post');
    });
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
