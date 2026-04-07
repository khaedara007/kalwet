<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'adminauth';
$route['admin/do_login'] = 'adminauth/do_login';
$route['admin/logout'] = 'adminauth/logout';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin'] = 'admin/dashboard';
$route['login'] = 'auth';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['riwayat_lurah'] = 'auth/riwayat_lurah';
$route['sop'] = 'auth/sop';
$route['dashboard'] = 'user/landing';
$route['landing'] = 'home/landing2';
$route['service/submit'] = 'service/submit';
$route['service/revise/(:num)'] = 'service/revise/$1';
// Surat Kematian Routes
$route['admin/suratkematian'] = 'suratkematian/index';
$route['admin/suratkematian/create'] = 'suratkematian/create';
$route['admin/suratkematian/store'] = 'suratkematian/store';
$route['admin/suratkematian/edit/(:num)'] = 'suratkematian/edit/$1';
$route['admin/suratkematian/update/(:num)'] = 'suratkematian/update/$1';
$route['admin/suratkematian/pdf/(:num)'] = 'suratkematian/pdf/$1';
$route['admin/suratkematian/delete/(:num)'] = 'suratkematian/delete/$1';
// Surat Kelahiran Routes
$route['admin/suratkelahiran'] = 'suratkelahiran/index';
$route['admin/suratkelahiran/create'] = 'suratkelahiran/create';
$route['admin/suratkelahiran/store'] = 'suratkelahiran/store';
$route['admin/suratkelahiran/edit/(:num)'] = 'suratkelahiran/edit/$1';
$route['admin/suratkelahiran/update/(:num)'] = 'suratkelahiran/update/$1';
$route['admin/suratkelahiran/pdf/(:num)'] = 'suratkelahiran/pdf/$1';
$route['admin/suratkelahiran/delete/(:num)'] = 'suratkelahiran/delete/$1';
