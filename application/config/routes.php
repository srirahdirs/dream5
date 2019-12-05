<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';


$route['register'] = 'welcome/register';
$route['getCityList'] = 'welcome/getCityList';

$route['login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';
$route['home'] = 'welcome/index';

//payments
$route['payment-response'] = 'payments/response';
$route['add-cash'] = 'payments/addCash';

//user
$route['my-profile'] = 'user/myProfile';
$route['update-profile'] = 'user/updateProfile';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
