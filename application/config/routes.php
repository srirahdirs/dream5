<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';


$route['register'] = 'welcome/register';
$route['login'] = 'welcome/login';
$route['logout'] = 'welcome/logout';
$route['home'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
