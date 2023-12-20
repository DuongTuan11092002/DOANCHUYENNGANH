<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/* ----------------------------------Home ----- --------------------------------- */
$route['danh-muc/(:any)']['GET'] = 'IndexController/Category/$1';
$route['thuong-hieu/(:any)']['GET'] = 'IndexController/AutoMaker/$1';
$route['san-pham/(:any)']['GET'] = 'IndexController/ProductCar/$1';
$route['gio-hang/(:any)']['GET'] = 'IndexController/Cart';
$route['dang-nhap/(:any)']['GET'] = 'IndexController/Login';







/* --------------------Admin--------------------------------------- */
/*                                    LOGIN                                   */

$route['login']['GET'] = 'LoginController/index'; //route này khi đăng nhập mở login 
$route['login-user']['POST'] = 'LoginController/login'; //  route này khi nhẫn login vào trang login-user

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                               DOASBOARD ADMIN                              */

$route['dashboard']['GET'] = 'DashboardController/index'; //  route này khi nhẫn login vào trang login-user
$route['logout']['GET'] = 'DashboardController/logout';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 PRODUCT CAR                                */

$route['productCar/list']['GET'] = 'ProductController/list'; // route   
$route['productCar/delete/(:any)']['GET'] = 'ProductController/delete/$1';   

$route['productCar/edit/(:any)']['GET'] = 'ProductController/edit/$1';   
$route['productCar/update/(:any)']['POST'] = 'ProductController/update/$1';  



$route['productCar/includeProduct']['POST'] = 'ProductController/includeProduct';
$route['productCar/create']['GET'] = 'ProductController/create'; 


/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                               PRODUCT DETAIL                               */

$route['productCarDetail/list']['GET'] = 'ProductDetailController/list';   
$route['productCarDetail/delete/(:any)']['GET'] = 'ProductDetailController/delete/$1';   

$route['productCarDetail/edit/(:any)']['GET'] = 'ProductDetailController/edit/$1';   
$route['productCarDetail/update/(:any)']['POST'] = 'ProductDetailController/update/$1';  


$route['productCarDetail/formCreateProductDetail']['POST'] = 'ProductDetailController/formCreateProductDetail';
$route['productCarDetail/create']['GET'] = 'ProductDetailController/create'; 
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                  ACCESSARY                                 */

// $route['productAccessary/list']['GET'] = 'AccessaryController/list';  
// $route['productAccessary/delete/(:any)']['GET'] = 'AccessaryController/delete/$1';  

// $route['productAccessary/edit/(:any)']['GET'] = 'AccessaryController/edit/$1';  
// $route['productAccessary/update/(:any)']['POST'] = 'AccessaryController/update/$1';   

// $route['productAccessary/formCreateAccessary']['POST'] = 'AccessaryController/formCreateAccessary';
// $route['productAccessary/create']['GET'] = 'AccessaryController/create'; 


/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 AUTO MAKER                                 */

$route['AutoMaker/list']['GET'] = 'AutoMakerController/list';   
$route['AutoMaker/delete/(:any)']['GET'] = 'AutoMakerController/delete/$1';  

$route['AutoMaker/edit/(:any)']['GET'] = 'AutoMakerController/edit/$1';  
$route['AutoMaker/update/(:any)']['POST'] = 'AutoMakerController/update/$1';   

$route['AutoMaker/formCreateAutoMaker']['POST'] = 'AutoMakerController/formCreateAutoMaker';
$route['AutoMaker/create']['GET'] = 'AutoMakerController/create';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                               ACCESSARY MAKER                              */

// $route['AccessaryMaker/list']['GET'] = 'AccessaryMakerController/list';   
// $route['AccessaryMaker/delete/(:any)']['GET'] = 'AccessaryMakerController/delete/$1';  

// $route['AccessaryMaker/edit/(:any)']['GET'] = 'AccessaryMakerController/edit/$1';  
// $route['AccessaryMaker/update/(:any)']['POST'] = 'AccessaryMakerController/update/$1';   

// $route['AccessaryMaker/formCreateAccessaryMaker']['POST'] = 'AccessaryMakerController/formCreateAccessaryMaker';
// $route['AccessaryMaker/create']['GET'] = 'AccessaryMakerController/create';

/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                                  CATEGORY                                  */

$route['Category/list']['GET'] = 'CategoryController/list';   //show danh sách
$route['Category/delete/(:any)']['GET'] = 'CategoryController/delete/$1';   //delete
//chỉnh sửa
$route['Category/edit/(:any)']['GET'] = 'CategoryController/edit/$1';   //lấy dữ liệu từ form chỉnh sữa
$route['Category/update/(:any)']['POST'] = 'CategoryController/update/$1';   //đưa dữ liệu đã chỉnh sửa đẩy lên font end

// đưa dữ liệu từ database lên fonten
$route['Category/create']['GET'] = 'CategoryController/create'; //lấy dữ liệu từ form thêm để insert data
$route['Category/formCategory']['POST'] = 'CategoryController/formCategory';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                    News                                    */
$route['New/list']['GET'] = 'NewController/list';   //show danh sách
$route['New/delete/(:any)']['GET'] = 'NewController/delete/$1';   


$route['New/edit/(:any)']['GET'] = 'NewController/edit/$1';  
$route['New/update/(:any)']['POST'] = 'NewController/update/$1';   


$route['New/create']['GET'] = 'NewController/create';
$route['New/formCreateNew']['POST'] = 'NewController/formNew';

/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                                 NEWS DETAIL                                */
$route['NewDetail/list']['GET'] = 'NewDetailController/list';   //show danh sách
$route['New/delete/(:any)']['GET'] = 'NewController/delete/$1';   


$route['NewDetail/edit/(:any)']['GET'] = 'NewDetailController/edit/$1';  
$route['NewDetail/update/(:any)']['POST'] = 'NewDetailController/update/$1';   


$route['NewDetail/create']['GET'] = 'NewDetailController/create';
$route['NewDetail/formCreateNewDetail']['POST'] = 'NewDetailController/formNewDetail';
/* -------------------------------------------------------------------------- */