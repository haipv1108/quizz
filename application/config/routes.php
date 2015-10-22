<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//verify
$route['verify'] = 'verify/index';
$route['verify/login'] = 'verify/login';
$route['verify/logout'] = 'verify/logout';

//admin
$route['admin'] = 'admin';
$route['admin/:num'] = 'admin/index/$1';
$route['admin/adduser'] = 'admin/adduser';
$route['admin/edituser'] = 'admin/edituser';
$route['admin/deleteuser'] = 'admin/deleteuser';

//category
$route['category'] = 'category';
$route['category/:num'] = 'category/index/$1';
$route['category/addcategory'] = 'category/addcategory';
$route['category/deletecategory'] = 'category/deletecategory';

//subject
$route['subject'] = 'subject';
$route['subject/:num'] = 'subject/index/$1';

//question
$route['question'] = 'question/index';
$route['question/:num'] = 'question/index/$1';
$route['question/editquestion'] = 'question/editquestion';
$route['question/deletequestion'] = 'question/deletequestion';
$route['question/searchquestion'] = 'question/searchquestion';

//profile
$route['profile'] = 'profile/index';
