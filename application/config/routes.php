<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'common';


$route['register'] = 'common/register';
$route['getCityList'] = 'common/getCityList';
$route['getSelectedCityList'] = 'common/getSelectedCityList';

$route['login'] = 'common/login';
$route['logout'] = 'common/logout';
$route['home'] = 'common/index';

//payments
$route['payment-response'] = 'payments/response';
$route['add-cash'] = 'payments/addCash';

//user
$route['my-profile/(:any)'] = 'user/myProfile/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
