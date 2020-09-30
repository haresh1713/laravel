<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        try {
            $rememberMe = false;
            $user = User::where('email', $request->email)->first();
            if($user->status == 0)
            {
                $message = 'Inactive user';
                return redirect('/login')->with('error_msg', $message);
            }

            if (!empty($user)) {
                    //Matching password using hash
                    $isPasswordMatched = \Hash::check($request->password, $user->password);
                    if ($isPasswordMatched) {
                        Auth::loginUsingId($user->id, $rememberMe);
                        $request->session()->put('id', $user->id);
                        $request->session()->put('role', $user->role);
                        $request->session()->put('name', $user->name);
                        $message = 'Login successfully';
                        return redirect('/home')->with('success_msg', $message);
                    }
                }
        } catch (\Exception $e) {
            $message = 'Invalid login credentials';
            return redirect('/login')->with('error_msg', $message);
        }
        $message = 'Invalid login credentials';
            return redirect('/login')->with('error_msg', $message);
    }


    public function logoutUser(Request $request){
        Auth::logout();
        Session::forget('id');
        Session::forget('role');
        return redirect('/login');
    }

}
