<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ZakladC::index');
$routes->get('race/(:num)', 'RaceC::index/$1');
