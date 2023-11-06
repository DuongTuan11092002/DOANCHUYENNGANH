<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//Đăng nhập
$route['login']['GET'] = 'LoginController/index'; //route này khi đăng nhập mở login 
$route['login-user']['POST'] = 'LoginController/login'; //  route này khi nhẫn login vào trang login-user

//Dasboard admin
$route['dashboard']['GET'] = 'DashboardController/index'; //  route này khi nhẫn login vào trang login-user
$route['logout']['GET'] = 'DashboardController/logout';

// sản phẩm 
$route['productCar/create']['GET'] = 'ProductController/create'; //add
$route['productCar/list']['GET'] = 'ProductController/list';   //list
$route['productCar/delete/(:any)']['GET'] = 'ProductController/delete/$1';   //delete
$route['productCar/edit/(:any)']['GET'] = 'ProductController/edit/$1';   //edit
$route['productCar/update/(:any)']['POST'] = 'ProductController/update/$1';   //edit


$route['productCar/includeProduct']['POST'] = 'ProductController/includeProduct';
