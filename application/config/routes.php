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
$route['withdraw-reversal'] = 'payments/withdrawReversal';
$route['payments/withdrawHistory/(:num)'] = 'payments/withdrawHistory';
$route['payments/transactions/(:num)'] = 'payments/transactions';
$route['add-practice-cash'] = 'payments/addPracticeCash';


//user
$route['my-profile/(:any)'] = 'user/myProfile/$1';
$route['change-password/(:any)'] = 'user/changePassword/$1';
$route['forgot-password'] = 'user/forgotPassword';
$route['set-new-password/(:any)'] = 'user/setNewPassword/$1';



/**************ADMIN HOME**************/
$route['admin/home'] = 'admin/home/index';
$route['admin/login'] = 'admin/home/login';
$route['admin/logout'] = 'admin/home/logout';
/**************ADMIN users**************/
$route['admin/users/(:num)'] = 'admin/users/index';
$route['admin/users/delete/(:any)'] = 'admin/users/delete/$1';
/**************ADMIN countries**************/
$route['admin/countries/(:num)'] = 'admin/countries';
$route['admin/countries/add'] = 'admin/countries/add';
$route['admin/countries/edit/(:any)'] = 'admin/countries/edit/$1';
$route['admin/countries/delete/(:any)'] = 'admin/countries/delete/$1';
/**************ADMIN cities**************/
$route['admin/cities/(:num)'] = 'admin/cities/index';
$route['admin/cities/add'] = 'admin/cities/add';
$route['admin/cities/edit/(:any)'] = 'admin/cities/edit/$1';
$route['admin/cities/delete/(:any)'] = 'admin/cities/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
