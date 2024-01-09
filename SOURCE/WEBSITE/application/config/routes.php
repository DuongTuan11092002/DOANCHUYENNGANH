<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'indexController';
$route['404_override'] = 'indexController/Error404';
$route['translate_uri_dashes'] = FALSE;


/* -------------------------------------------------------------------------- */
/*                            TRẢNG-CHỦ-NGƯỜI-DÙNG                            */
$route['trang-chu/']['GET'] = 'IndexController/index';

$route['danh-muc/(:any)/(:any)']['GET'] = 'IndexController/Category/$1/$2';
$route['danh-muc-tin/(:any)/(:any)']['GET'] = 'IndexController/CategoryBlog/$1/$2';
$route['bai-viet/(:any)/(:any)']['GET'] = 'IndexController/Blog/$1/$2';

$route['thuong-hieu/(:any)/(:any)']['GET'] = 'IndexController/AutoMaker/$1/$2';
$route['san-pham/(:any)/(:any)']['GET'] = 'IndexController/ProductCar/$1/$2';
$route['tim-kiem']['GET'] = 'IndexController/Search';
$route['lien-he']['GET'] = 'IndexController/Contact';
$route['gui-lien-he']['POST'] = 'IndexController/SendContact';




/* -------------------------------------------------------------------------- */
/*                                 PHÂN-TRANG                                 */
// $route['phan-trang/index/(:num)'] = 'IndexController/index/$1';
// $route['phan-trang/index'] = 'IndexController/index';

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 SEND-EMAIL                                 */
$route['test-email'] = 'IndexController/SendEmail';


/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                  GIỎ-HÀNG                                  */
$route['gio-hang']['GET'] = 'IndexController/Cart';
/* ------------------------------ thêm-giỏ-hàng ----------------------------- */
$route['them-gio-hang']['POST'] = 'IndexController/AddToCart';
/* -------------------------- xóa-sản-phẩm-giỏ-hàng ------------------------- */
$route['xoa-gio-hang']['GET'] = 'IndexController/DeleteAllCart';
$route['xoa-san-pham/(:any)']['GET'] = 'IndexController/DeleteItemCart/$1';
/* ---------------------------- cập-nhật-giỏ-hàng --------------------------- */
$route['cap-nhat-gio-hang']['POST'] = 'IndexController/UpdateCart';
/* ------------------------------- thanh-toán ------------------------------- */
$route['kiem-tra-thanh-toan']['GET'] = 'IndexController/Checkout';
/* ---------------------------- CONFIRM-DAT-HANG ---------------------------- */
$route['xac-nhan-dat-hang']['POST'] = 'IndexController/ConfirmCheckout';
/* -------------------------------------------------------------------------- */
/* -------------------------- PAGE-THANK-AGTER-BUY -------------------------- */
$route['cam-on']['GET'] = 'IndexController/Thank';


/* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- */
/*                            ĐĂNG-NHẬP-NGƯỜI-DÙNG                            */

$route['dang-nhap']['GET'] = 'IndexController/Login';
$route['dang-nhap-nguoi-dung']['POST'] = 'IndexController/LoginCustomer';
$route['dang-xuat']['GET'] = 'IndexController/Logout';
/* --------------------------------- ĐĂNG-KÝ -------------------------------- */
$route['dang-ky']['GET'] = 'IndexController/Register';
$route['dang-ky-customer']['POST'] = 'IndexController/RegisterCustomer';


/* -------------------------------------------------------------------------- */








/* -----------------------------------ADMIN--------------------------------------- */
/*                                    LOGIN (ADMIN)                                   */

$route['login']['GET'] = 'LoginController/index'; //route này khi đăng nhập mở login 
$route['login-admin']['POST'] = 'LoginController/login'; //  route này khi nhẫn login vào trang login-ADMIN
$route['register_admin']['GET'] = 'LoginController/Register'; //route này khi đăng nhập mở login 
$route['registerInsert']['POST'] = 'LoginController/RegisterInsert'; //  route này khi nhẫn login vào trang login-ADMIN



/* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- */
/*                               DOASBOARD (ADMIN)                              */

$route['dashboard']['GET'] = 'DashboardController/index'; //  route này khi nhẫn login vào trang login-user
$route['logout']['GET'] = 'DashboardController/logout';
$route['dashboard/delete/(:any)']['GET'] = 'DashboardController/delete/$1';

/* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- */
/*                                 PRODUCT CAR (ADMIN)                               */

$route['productCar/list']['GET'] = 'ProductController/list'; // route   
$route['productCar/delete/(:any)']['GET'] = 'ProductController/delete/$1';

$route['productCar/edit/(:any)']['GET'] = 'ProductController/edit/$1';
$route['productCar/update/(:any)']['POST'] = 'ProductController/update/$1';



$route['productCar/includeProduct']['POST'] = 'ProductController/includeProduct';
$route['productCar/create']['GET'] = 'ProductController/create';

// tìm kiếm sản phẩm
$route['search-product']['GET'] = 'ProductController/searchProduct';



/* -------------------------------------------------------------------------- */



/* -------------------------------------------------------------------------- */
/*                               PRODUCT DETAIL  (ADMIN)                             */

$route['productCarDetail/list']['GET'] = 'ProductDetailController/list';
$route['productCarDetail/delete/(:any)']['GET'] = 'ProductDetailController/delete/$1';

$route['productCarDetail/edit/(:any)']['GET'] = 'ProductDetailController/edit/$1';
$route['productCarDetail/update/(:any)']['POST'] = 'ProductDetailController/update/$1';


$route['productCarDetail/formCreateProductDetail']['POST'] = 'ProductDetailController/formCreateProductDetail';
$route['productCarDetail/create']['GET'] = 'ProductDetailController/create';


//tìm kiếm chi tiết sản phẩm
$route['search-productDetail']['GET'] = 'ProductDetailController/searchProductDetail';

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
/*                                 AUTO MAKER (ADMIN)                                */

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
/*                                  CATEGORY  (ADMIN)                              */

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
/*                                    NEWS (ADMIN)                                  */
$route['New/list']['GET'] = 'NewController/list';   //show danh sách
$route['New/delete/(:any)']['GET'] = 'NewController/delete/$1';


$route['New/edit/(:any)']['GET'] = 'NewController/edit/$1';
$route['New/update/(:any)']['POST'] = 'NewController/update/$1';


$route['New/create']['GET'] = 'NewController/create';
$route['New/formCreateNew']['POST'] = 'NewController/formNew';

/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                                 NEWS DETAIL (ADMIN)                            */
$route['NewDetail/list']['GET'] = 'NewDetailController/list';   //show danh sách
$route['New/delete/(:any)']['GET'] = 'NewController/delete/$1';


$route['NewDetail/edit/(:any)']['GET'] = 'NewDetailController/edit/$1';
$route['NewDetail/update/(:any)']['POST'] = 'NewDetailController/update/$1';


$route['NewDetail/create']['GET'] = 'NewDetailController/create';
$route['NewDetail/formCreateNewDetail']['POST'] = 'NewDetailController/formNewDetail';
/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                                  ĐƠN-HÀNG                                  */
$route['Order/list']['GET'] = 'OrderController/index';
$route['Order/view/(:any)']['GET'] = 'OrderController/View/$1';
$route['Order/delete/(:any)']['GET'] = 'OrderController/DeleteOrder/$1';

/* ---------------------- THÔNG-BÁO-TÌNH-TRẠNG-ĐƠN-HÀNG --------------------- */
$route['Order/process']['POST'] = 'OrderController/Process';

/* ------------------------------- IN-ĐƠN-HÀNG ------------------------------ */
// $route['Order/print-order/(:any)']['GET'] = 'OrderController/PrintOrder/$1';


/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*                              DANH-MỤC-TIN-TỨC                              */
$route['Blog/list']['GET'] = 'BlogController/list';
$route['Blog/delete/(:any)']['GET'] = 'BlogController/delete/$1';

$route['Blog/edit/(:any)']['GET'] = 'BlogController/edit/$1';
$route['Blog/update/(:any)']['POST'] = 'BlogController/update/$1';

$route['Blog/formCreateBlog']['POST'] = 'BlogController/formCreateBlog';
$route['Blog/create']['GET'] = 'BlogController/create';
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                  BÀI VIẾT                                  */
$route['Post/list']['GET'] = 'PostController/list';
$route['Post/delete/(:any)']['GET'] = 'PostController/delete/$1';

$route['Post/edit/(:any)']['GET'] = 'PostController/edit/$1';
$route['Post/update/(:any)']['POST'] = 'PostController/update/$1';

$route['Post/formCreatePost']['POST'] = 'PostController/formCreatePost';
$route['Post/create']['GET'] = 'PostController/create';

/* -------------------------------------------------------------------------- */