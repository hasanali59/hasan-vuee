<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function Login(){
        if(Session::has('user')){
            return redirect()->route('dashboard');
        }else{
            $message="";
            return view('login',['message'=>$message]);
        }
    }

    function userLogin(Request $request){
        $email= $request->input('email');
        $password=$request->input('password');

        $userDb = User::where('email', '=', $email)->where('password', '=', $password)->first();

        if($userDb==null){
            $message="Email or Password Not Matched";
            return view('login',['message'=>$message]);

        }else {
            session(['user' => $userDb]);
            return redirect()->route('dashboard');
        }
    }

    function viewProfile($id){
        $user = User::find($id);

        return view('view_profile', ['user' => $user]);
    }

    function profile(Request $request){
        $id = Session::get('user.id');
        $user = User::find($id);

        return view('profile', ['user' => $user]);
    }

    public function logOut(){
        session()->forget('user');
        return redirect()->route('login');
    }
}
