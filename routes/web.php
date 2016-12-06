<?php

use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    if(!empty(Session::get('user'))){
        $user = User::find(Session::get('user'));
        if($user->user_type_id==1){
            $users = User::with('user_types')->orderBy('login')->get();
           // info()
        }
        else{
            $users=null;
        }
        return view('main',["users"=>$users]);
    }
    else{
        return view('main',["users"=>null]);
    }

});

Route::post('/login', "Login@Verify_User");
Route::post('/logout', "Login@Logout");