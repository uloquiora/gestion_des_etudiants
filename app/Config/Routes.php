<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'loginController::index');
$routes->post('/login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/admin/dashboard', 'adminController::index');
$routes->get('/teacher/dashboard', 'teacherController::index');
$routes->get('/student/dashboard', 'studentController::index');
