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
$route['default_controller']   = 'home';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;


// About Us
$route['about-us/sardardham-a-thought'] = 'sardardham/index';
$route['about-us/mission-vision-goal']  = 'sardardham/mission';
$route['about-us/philanthropist']       = 'philanthropist/index';
$route['about-us/team-sardardham']      = 'sardardham/team';

// Our Goals
$route['our-goals/sardardham-building-project']          = 'home/buildingProject';
$route['our-goals/civil-service-centre']                 = 'home/civilServiceCentre';
$route['our-goals/global-patidar-business-organization'] = 'home/gpbo';
$route['our-goals/global-patidar-business-summit-gpbs']  = 'home/gpbs';
$route['our-goals/youth-organization']                   = 'home/youthOrganization';

// Activities
$route['activities/students-adoption-scheme']       = 'sardardham/datak_yojna';
$route['activities/higher-education-assistance-scheme']       = 'sardardham/higher_education_assistance_scheme';
$route['activities/scholarship-scheme']             = 'sardardham/scholarship_scheme';
$route['activities/ek-vichar-magazine']                         = 'update';
$route['activities/revenue-guidance-centre']        = 'sardardham/revenue_guidance_centre';
$route['activities/medical-centre']                 = 'sardardham/medical_centre';
$route['activities/business-development-center']    = 'sardardham/business_development_center';
$route['activities/trustee-guest-house']            = 'sardardham/trustee_guest_house';
$route['activities/hospitality-center']             = 'sardardham/hospitality_center';

// SPIBO
$route['spibo'] = 'sardardham/spibo';

// Media
$route['media/news']            = 'update/news';
$route['media/news-event']    = 'update/news';
$route['media/event']           = 'update/event';
$route['media/video-gallery']   = 'gallery/video_gallery';
$route['media/gallery']         = 'gallery';
// $route['media/news-details']   = 'update/news_details';
$route['media/news-details/(:any)'] = 'update/news_details/$1';


// Donation
$route['donation'] = 'sardardham/donation';

// Contact Us
$route['contact-us'] = 'connect';


// $routes->match(['get','post'],'/my_token','Login::my_token');