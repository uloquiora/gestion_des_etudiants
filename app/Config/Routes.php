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
$routes->get('/admin/logout', 'AdminController::logout');


// Teacher and student routes
$routes->get('/teacher/dashboard', 'TeacherController::index'); // Teacher dashboard
$routes->get('/student/dashboard', 'studentController::index'); // Student dashboard
$routes->get('/student/edit_profile/(:num)', 'studentController::editUser/$1'); // Edit user by ID
$routes->post('/student/update_user/(:num)', 'studentController::updateUser/$1'); // Update user by ID

$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile/edit', 'ProfileController::edit');
$routes->get('/student/courses', 'Courses::index');  // This maps to the Courses controller's index method

$routes->get('courses', 'Courses::index');
$routes->get('courses/download/(:any)', 'Courses::download/$1');
// app/Config/Routes.php
$routes->get('/upload_courses', 'upload::index'); // To show the upload form
$routes->post('/upload_courses', 'upload::upload'); // Handle the file upload


