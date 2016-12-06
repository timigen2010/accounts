<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use PDO;

class Login extends Controller
{
    public function Verify_User(Request $request){
        if(isset($request->login) && isset($request->password)) {
            $user = User::where('login','=',$request->login)->where('password','=',md5($request->password))->first();
            if($user){
                Session::put('user',$user->id);
                if($user->user_type_id==1){
                    $users = User::with('user_types')->orderBy('login')->get();
                }
                else{
                    $users = null;
                }
                return json_encode($users);
            }
            else return 0;
        }
        else {
            return -1;
        }
    }

    public function Logout(){
        Session::pull('user');
        return json_encode(0);
    }
}
