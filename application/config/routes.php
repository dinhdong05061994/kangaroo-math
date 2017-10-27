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

$route['default_controller'] = "ikmc2017_controller";
$route['404_override'] = '';
$route['violympic'] = 'violympic/config_test';


// $route['introduce_competition'] = 'home/action/introduce_competition';
// $route['winners'] = 'home/action/winners';
// $route['summer_camp'] = 'home/action/summer_camp';
// $route['organizers'] = 'home/action/organizers';
// $route['info_sign_up'] = 'home/action/info_sign_up';
// $route['test_schedule_address'] = 'home/action/test_schedule_address';
// $route['regulation_competition'] = 'home/action/regulation_competition';
// $route['awards'] = 'home/action/awards';
$route['user/signup'] = 'user_controller/signup';
/* courses for students */
$route['mng_user'] = "admin_users/index"; 
$route['mng_user/(:num)'] = "admin_users/index/$1";
$route['mng_user/add-user'] = "admin_users/signup";
$route['mng_user/edit-user-(:num)'] = "admin_users/change_infor_user/$1";
$route['mng_user/edit-(:num)'] = "admin_users/show_box_change/$1";
$route['mng_user/delete-(:num)'] = "admin_users/del_user/$1";
$route['mng_user/search'] = "admin_users/search";
$route['mng_user/search/(:num)'] = "admin_users/search/$1";
$route['rank_accumulated_points'] = 'rank_accumulated_points/top20';
$route['home/main_page'] = "#";

$route['do_competition_month-(:any)'] = 'competition_month/do_test/$1';
//game
$route['goc-giai-tri'] = 'entertainmentcorner/index';
$route['tro-choi-nho-so'] = 'entertainmentcorner/remember_number';
$route['show-game-by-level'] = 'entertainmentcorner/show_games';
$route['competition'] = 'ikmc2017_controller/introduction';
$route['gallery'] = 'ikmc2017_controller/gallery';
$route['contactus'] = 'ikmc2017_controller/contactus';
$route['home'] = 'ikmc2017_controller/index';
$route['ikmc'] = 'ikmc2017_controller/index';
$route['register'] = 'ikmc2017_controller/register';
$route['passedpapers'] = 'ikmc_practice/index';
$route['ikmc_practice'] = 'violympic/config_test';
$route['createaccount'] = 'createaccount_controller/createaccountfordtdschool';
$route['student/search'] = 'studentcard_controller/showSearchforcard';
$route['student/export'] = 'studentcard_controller/export_card';
$route['student/search/result'] = 'studentcard_controller/searchforcard';
$route['student/search/error'] = 'studentcard_controller/sendErrorForm';
$route['student/search/error/report'] = 'studentcard_controller/saveErrorReport';
$route['backend/report/updatestate'] = 'studentcard_controller/updateReport';
$route['ikmc/livestat'] = 'ikmcstatistics_controller/view';
$route['student/result'] = 'ikmc2017result_controller/searchresult';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
