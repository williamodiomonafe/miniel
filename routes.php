<?php
// The Routes File...

// use App\App\Classes\Route;

Route::get([
            '/' => 'HomeController@index',
            '/logout' => 'AuthController@destroy',
            '/login' => 'AuthController@create',
            '/register' => 'UserController@create',
            '/404' => 'HomeController@notfound',
          ]);


Route::post([
//            '/' => 'HomeController@save',
          ]);
        