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
$route['payment-request'] = 'payments/request';
$route['add-cash'] = 'payments/addCash';
$route['withdraw-cash'] = 'payments/withdrawCash';
$route['add-practice-cash'] = 'payments/addPracticeCash';


//user
$route['my-profile/(:any)'] = 'user/myProfile/$1';
$route['change-password/(:any)'] = 'user/changePassword/$1';
$route['forgot-password'] = 'user/forgotPassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
