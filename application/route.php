<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::rule('/','index/home/index');//home
Route::rule('home','index/home/index');

Route::rule('login','index/login/login');
Route::rule('login_jump','index/login/login_jump');

Route::rule('logout','index/login/logout');


//Route::get('browse/:gsenumber/:species/:assaytype','index/browse/browse_detail',[]);
Route::rule('reg','index/login/reg');
Route::rule('reg_jump','index/login/reg_jump');

Route::rule('user','index/user/user');
Route::rule('user/own','index/user/own');
