<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pages', 'Pages::index');
$routes->get('/pages/dashutama', 'Pages::dashutama');
$routes->get('/pages/rka', 'Pages::rka');
$routes->get('/pages/airside', 'Pages::airside');
$routes->get('/pages/addairside', 'Pages::addairside');
$routes->get('/pages/dashairside', 'Pages::dashAirside');
$routes->get('/pages/dashairsidegm', 'Pages::dashAirsideGm');
$routes->post('/pages/importexcel', 'Pages::importexcel');
$routes->get('/pages/rkacoba', 'Pages::rkacoba');
$routes->get('/pages/insert-data', 'Pages::insertDataAirside');
$routes->delete('/pages/(:num)', 'Pages::deleteAirside/$1');
$routes->post('/pages/saveairside', 'Pages::saveAirside');
$routes->get('/pages/editairside/(:segment)', 'Pages::editAirside/$1');
$routes->post('/pages/update/(:segment)', 'Pages::updateAirside/$1');
$routes->get('/pages/akun', 'Pages::glAccount');
$routes->post('/pages/saveakun', 'Pages::saveAccount');
$routes->delete('/pages/deleteakun/(:num)', 'Pages::deleteAccount/$1');
$routes->get('/pages/editakun/(:segment)', 'Pages::editAccount/$1');
$routes->post('/pages/updateAccount/(:segment)', 'Pages::updateAccount/$1');
$routes->get('/pages/rekapitulasi', 'Pages::rekapitulasi');
$routes->post('/pages/airside', 'Pages::airside');
$routes->post('/pages/rkacoba', 'Pages::rkacoba');
$routes->get('/pages/exportExcel', 'Pages::exportExcel');
$routes->get('/pages/exportDashAirside', 'Pages::exportDashAirside');

$routes->get('/landside/landside', 'Landside::landside');
$routes->get('/landside/addlandside', 'Landside::addlandside');
$routes->post('/landside/savelandside', 'Landside::saveLandside');
$routes->delete('/landside/(:num)', 'Landside::deleteLandside/$1');
$routes->get('/landside/editlandside/(:segment)', 'Landside::editLandside/$1');
$routes->post('/landside/update/(:segment)', 'Landside::updateLandside/$1');
$routes->get('/landside/dashlandside', 'Landside::dashLandside');
$routes->get('/landside/dashlandsidegm', 'Landside::dashLandsideGm');
$routes->post('/landside/landside', 'Landside::landside');
$routes->get('/landside/exportexcellandside', 'Landside::exportExcelLandside');
#User
$routes->get('/pages/login', 'User::login');
$routes->post('/pages/loginProcess', 'User::loginProcess');
$routes->get('/pages/user', 'User::user');
$routes->get('/pages/adduser', 'User::addUser');
$routes->post('/pages/saveuser', 'User::saveUser');
$routes->get('/user/logout', 'User::logout');
$routes->delete('/pages/deleteuser/(:num)', 'User::deleteUser/$1');
$routes->get('/pages/edituser/(:segment)', 'User::editUser/$1');
$routes->post('/pages/updateUser/(:segment)', 'User::updateUser/$1');
$routes->get('/pages/exportExcelUser', 'User::exportExcelUser');

$routes->get('/pages/exportExcelRekapitulasi', 'Pages::exportExcelRekapitulasi');
$routes->get('/pages/exportExcelGLAccount', 'Pages::exportExcelGLAccount');
$routes->get('/pages/mechanical', 'Mechanical::mechanical');
$routes->get('/pages/mechanical/addmechanical', 'Mechanical::addMechanical');
$routes->get('/pages/mechanical/dashmechanical', 'Mechanical::dashMechanical');
$routes->get('/pages/mechanical/dashmechanicalgm', 'Mechanical::dashMechanicalGm');
$routes->get('/pages/editmechanical/(:segment)', 'Mechanical::editMechanical/$1');
$routes->post('pages/mechanical/savemechanical', 'Mechanical::saveMechanical');
$routes->post('/pages/mechanical/update/(:segment)', 'Mechanical::updateMechanical/$1');
$routes->delete('/pages/mechanical/(:num)', 'Mechanical::deleteMechanical/$1');

$routes->get('/pages/electrical/excelelectrical', 'Electrical::exportExcelElectrical');
$routes->get('/pages/electrical', 'Electrical::electrical');
$routes->get('/pages/electrical/addelectrical', 'Electrical::addElectrical');
$routes->get('/pages/electrical/dashelectrical', 'Electrical::dashElectrical');
$routes->get('/pages/electrical/dashelectricalgm', 'Electrical::dashElectricalGm');
$routes->get('/pages/editelectrical/(:segment)', 'Electrical::editElectrical/$1');
$routes->post('pages/electrical/saveelectrical', 'Electrical::saveElectrical');
$routes->post('/pages/electrical/update/(:segment)', 'Electrical::updateElectrical/$1');
$routes->delete('/pages/electrical/(:num)', 'Electrical::deleteElectrical/$1');
$routes->get('/pages/electrical/excelelectrical', 'Electrical::exportExcelElectrical');

$routes->get('/pages/airporttech/excelairporttech', 'AirportTech::exportExcelAirportTech');
$routes->get('/pages/airporttech', 'AirportTech::airporttech');
$routes->get('/pages/airporttech/addairporttech', 'AirportTech::addAirportTech');
$routes->get('/pages/airporttech/dashairporttech', 'AirportTech::dashAirportTech');
$routes->get('/pages/airporttech/dashairporttechgm', 'AirportTech::dashAirportTechGm');
$routes->get('/pages/editairporttech/(:segment)', 'AirportTech::editAirportTech/$1');
$routes->post('pages/airporttech/saveairporttech', 'AirportTech::saveAirportTech');
$routes->post('/pages/airporttech/update/(:segment)', 'AirportTech::updateAirportTech/$1');
$routes->delete('/pages/airporttech/(:num)', 'AirportTech::deleteAirportTech/$1');
$routes->get('/pages/airporttech/excelairporttech', 'AirportTech::exportExcelAirportTech');
