<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//front
$route['default_controller']    = 'homepage';
$route['register']              = 'UserAuth/register';
$route['login']                 = 'UserAuth/login';
$route['profile']               = 'Homepage/profile';
$route['watch/(.+)/(.+)']       = 'SmDetail/watchDetail/$1/$2';
$route['watch/(.+)']            = 'SmDetail/index/$1';

//back
$route['nedmin']                    =   'Back/Dashboard/index';
$route['nedmin/login']              =   'Back/Dashboard/loginPage';
$route['nedmin/sm-list']            =   'Back/Dashboard/smListPage';
$route['nedmin/sm-create']          =   'Back/Dashboard/smCreatePage';
$route['nedmin/sm-update/(.+)']     =   'Back/Dashboard/smUpdatePage/$1';
$route['nedmin/sm-view/(.+)']       =   'Back/Dashboard/smViewPage/$1';

$route['nedmin/sm-episode-update/(.+)']     =   'Back/Dashboard/smEpisodePage/$1';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



