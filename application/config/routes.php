<?php
    defined('BASEPATH') or exit('No direct script access allowed');

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
    |	https://codeigniter.com/userguide3/general/routing.html
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

    // api.localhost.test/items
    // https://stackoverflow.com/questions/14710509/codeigniter-routing-and-rest-server
    $route['items'] = 'api/Item/indexItem';
    $route['item/(:any)'] = 'api/Item/indexItem/$1';
    $route['item/store'] = 'api/Item/storeItem';
    $route['item/update/(:any)'] = 'api/Item/updateItem/$1';
    $route['item/delete/(:any)'] = 'api/Item/deleteItem/$1';

    $route['products'] = 'api/Product/indexProduct';
    $route['product/(:any)'] = 'api/Product/indexProduct/$1';
    $route['product/store'] = 'api/Product/storeProduct';
    $route['product/update/(:any)'] = 'api/Product/updateProduct/$1';
    $route['product/delete/(:any)'] = 'api/Product/deleteProduct/$1';

    $route['employees'] = 'api/Employee/indexEmployee';
    $route['employee/(:any)'] = 'api/Employee/indexEmployee/$1';
    $route['employee/store'] = 'api/Employee/storeEmployee';
    $route['employee/update/(:any)'] = 'api/Employee/updateEmployee/$1';
    $route['employee/delete/(:any)'] = 'api/Employee/deleteEmployee/$1';