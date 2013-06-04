<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//
//$route['default_controller'] = "welcome";
//$route['404_override'] = '';
define('ADMIN_URL', 'admin');

$route['default_controller'] = 'client/pages';
$route['scaffolding_trigger'] = '';

//$route['upload'] = 'admin/media/uploadFile';
//$route['contacts'] = 'client/map/index';
$route['product/:num'] = 'client/product/index';
$route['category'] = 'client/category/products';
$route['category/([a-zA-Z-=+]+)'] = 'client/category/index';
$route['category/(\d+)?'] = 'client/category/products/$1';
$route['category/new'] = 'client/category';
$route['search'] = 'client/product/search';
$route['subscribe'] = 'client/email/subscribe';

$route['contacts'] = 'client/article/show/';

$route['article/discounts'] = 'client/article/index/';
$route['article/:any'] = 'client/article/show/';
$route['howto_order'] = 'client/article/show/';
$route['payments'] = 'client/article/show/';
$route['about_us'] = 'client/article/show/';
$route['articles'] = 'client/article/articles_list/';

$route['/map/map.xml'] = 'client/map/xml_map/';
$route['map/map.xml'] = 'client/map/xml_map/';
$route['map.xml'] = 'client/map/xml_map/';
//$route['map/xml_map'] = 'client/map/xml_map/';
$route['map/:any'] = 'client/map/city/';
$route['(?!' . preg_quote(ADMIN_URL) . ')(.+)'] = 'client/$1';
$route['(' . preg_quote(ADMIN_URL) . '/.+)']     = '$1';
$route[preg_quote(ADMIN_URL)]          = 'admin/general';

/* End of file routes.php */
/* Location: ./application/config/routes.php */