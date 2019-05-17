<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * @ SUPER ADMIN ROUTING
 */
/**
 * @ ADMIN LOGIN ROUTING 
 */
$route['admin/login'] = "admin/AuthController";
$route['admin/login/auth'] = "admin/AuthController/login";


/**
 * @ SUPER ADMIN CATEGORY / SUB-CATEGORY ROUTING
 */ 

$route['admin/vendors'] = "admin/VendorsController";
$route['admin/vendors/create'] = "admin/VendorsController/create";
$route['admin/vendors/create_vendor'] = "admin/VendorsController/createVendor";
/* #CATEGORY / SUB-CATEGORY EDIT/UPDATE ROUTING */ 
$route['admin/vendors/edit'] = "admin/VendorsController/edit";
$route['admin/vendors/edit_vendor'] = "admin/VendorsController/editVendor";


/**
 * @ SUPER ADMIN ITEMS ROUTING
 */

$route['admin/item'] = "admin/ItemController";
$route['admin/item/create'] = "admin/ItemController/create";
$route['admin/item/create_item'] = "admin/ItemController/createItem";
/* #ITEM EDIT/UPDATE ROUTING */ 
$route['admin/item/edit'] = "admin/ItemController/edit";
$route['admin/item/edit_item'] = "admin/ItemController/editItem";
/* #ITEM RATING ROUTING*/ 
$route['admin/item/item_rating'] = "admin/ItemController/itemRating";


/**
 * @ SUPER ADMIN UNITS ROUTING
 */ 

$route['admin/units'] = "admin/masters/UnitsController";
$route['admin/units/create'] = "admin/masters/UnitsController/create";
$route['admin/units/create_unit'] = "admin/masters/UnitsController/createUnit";
/* #UNITS EDIT/UPDATE ROUTING */ 
$route['admin/units/edit'] = "admin/masters/UnitsController/edit";
$route['admin/units/edit_unit'] = "admin/masters/UnitsController/editUnit";


/**
 * @ SUPER ADMIN BRANDS ROUTING
 */ 

$route['admin/brands'] = "admin/masters/BrandsController";
$route['admin/brands/create'] = "admin/masters/BrandsController/create";
$route['admin/brands/create_brand'] = "admin/masters/BrandsController/createBrand";
/* #BRANDS EDIT/UPDATE ROUTING */ 
$route['admin/brands/edit'] = "admin/masters/BrandsController/edit";
$route['admin/brands/edit_brand'] = "admin/masters/BrandsController/editBrand";


/**
 * @ SUPER ADMIN CATEGORY / SUB-CATEGORY ROUTING
 */ 

$route['admin/category'] = "admin/masters/CategoryController";
$route['admin/category/create'] = "admin/masters/CategoryController/create";
$route['admin/category/create_category'] = "admin/masters/CategoryController/createCategory";
/* #CATEGORY EDIT/UPDATE ROUTING */ 
$route['admin/category/edit'] = "admin/masters/CategoryController/edit";
$route['admin/category/edit_category'] = "admin/masters/CategoryController/editCategory";


/**
 * @ SUPER ADMIN DELIVERY BOY ROUTING
 */ 

$route['admin/delivery_boy'] = "admin/DeliveryBoyController";
$route['admin/delivery_boy/create'] = "admin/DeliveryBoyController/create";
$route['admin/delivery_boy/create_delivery_boy'] = "admin/DeliveryBoyController/createDeliveryBoy";
/* #DELIVERY BOY EDIT/UPDATE ROUTING */ 
$route['admin/delivery_boy/edit'] = "admin/DeliveryBoyController/edit";
$route['admin/delivery_boy/edit_delivery_boy'] = "admin/DeliveryBoyController/editDeliveryBoy";

/**
 * @ VENDOR ROUTING
 */

/**
 | #ITEM CREATE ROUTING
 */ 
$route['vendor/item'] = "vendor/ItemController";
$route['vendor/item/create'] = "vendor/ItemController/create";
$route['vendor/item/create_item'] = "vendor/ItemController/createItem";

/**
 | #ITEM EDIT/UPDATE ROUTING
 */ 
$route['vendor/item/edit'] = "vendor/ItemController/edit";
$route['vendor/item/edit_item'] = "vendor/ItemController/editItem";


//API
$route['api/v1/check'] = 'api/AuthController/check';
//register
$route['api/v1/register'] = 'api/AuthController/signup';
$route['api/v1/verify_otp_onetime'] = 'api/AuthController/verifyOtp';

$route['api/v1/login'] = 'api/AuthController/login';
$route['api/v1/forget'] = 'api/AuthController/forget';
$route['api/v1/resend_otp_email'] = 'api/AuthController/resendOtpMail';
$route['api/v1/resend_otp_mobile'] = 'api/AuthController/resendOtpMobile';

$route['api/v1/profile_view'] = 'api/AuthController/profile';
$route['api/v1/profile_update'] = 'api/AuthController/profileUpdate';

$route['api/v1/address_all'] = 'api/AddressController/allAddressView';
$route['api/v1/new_address_add'] = 'api/AddressController/addAddress';
$route['api/v1/address_update'] = 'api/AddressController/updateAddress';
$route['api/v1/address_delete'] = 'api/AddressController/deleteAddress';

$route['api/v1/store_feedback'] = 'api/FeedbackAPIController/storeFeedback';
$route['api/v1/delivery_boy_feedback'] = 'api/FeedbackAPIController/deliveryBoyFeedback';
$route['api/v1/all_store_feedback'] = 'api/FeedbackAPIController/allStoreFeedbackView';
$route['api/v1/store_feedback'] = 'api/FeedbackAPIController/storeFeedbackView';
$route['api/v1/all_delivery_boy_feedback'] = 'api/FeedbackAPIController/allDeliveryBoyFeedbackView';
$route['api/v1/delivery_boy_feedback'] = 'api/FeedbackAPIController/allDeliveryBoyFeedbackView';

$route['api/v1/all_store'] = 'api/VenderAPIController/AllStore';
$route['api/v1/store_one'] = 'api/VenderAPIController/oneStore';

$route['api/v1/category'] = 'api/CategoryAPIController/allCategory';

//Delivery 
$route['api/v1/delivery/login'] = "api/DeliveryLoginAPIController/login";
$route['api/v1/delivery/profile_view'] = "api/DeliveryLoginAPIController/profile";

//get products
$route['api/v1/products'] = "api/ProductAPIController/getAllProducts";

//order view only verification then data view
$route['api/v1/order_view'] = "api/OrderAPIController/orderView";
$route['api/v1/order_add'] = "api/OrderAPIController/orderAdd";
$route['api/v1/order_check'] = "api/OrderAPIController/orderCheck";
$route['api/v1/order_edit'] = "api/OrderAPIController/orderEdit";
$route['api/v1/order_payment_check'] = "api/OrderAPIController/paymentOrderCheck";
$route['api/v1/order_payment_success'] = "api/OrderAPIController/paymentOrderSuccess";
$route['api/v1/order_payment_cancel'] = "api/OrderAPIController/paymentOrderCancel";

//invoice generate
$route['order/invoice/(:any)'] = "PdfGenerate/index/$1";