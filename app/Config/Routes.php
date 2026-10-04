<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ZakladC::index');
$routes->get('Zavod/(:num)', 'RaceC::index/$1');
$routes->get('Vysledky/(:num)/(:num)','VysledkyC::index/$1/$2');
$routes->get('Pridat', 'AddRaceC::index');
$routes->post('Pridat/Add', 'AddRaceC::AddRace');