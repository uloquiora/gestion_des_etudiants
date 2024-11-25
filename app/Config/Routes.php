<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index'); // Login page
$routes->post('/login/authenticate', 'LoginController::authenticate'); // Authenticate user
$routes->get('/logout', 'LoginController::logout'); // Logout user

// Admin routes
$routes->get('/admin/dashboard', 'AdminController::index'); // Admin dashboard to display users
$routes->get('/admin/add_user', 'AdminController::addUser'); // Page to add a user
$routes->post('/admin/save_user', 'AdminController::saveUser'); // Save new user
$routes->get('/admin/edit_user/(:num)', 'AdminController::editUser/$1'); // Edit user by ID
$routes->post('/admin/update_user/(:num)', 'AdminController::updateUser/$1'); // Update user by ID
$routes->get('/admin/delete_user/(:num)', 'AdminController::deleteUser/$1'); // Delete user by ID

// Teacher and student routes
$routes->get('/teacher/dashboard', 'TeacherController::index'); // Teacher dashboard
$routes->get('/student/dashboard', 'StudentController::index'); // Student dashboard
