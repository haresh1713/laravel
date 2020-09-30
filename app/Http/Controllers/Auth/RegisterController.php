<?php
 
namespace App\Http\Controllers\Auth;
 
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
 
class RegisterController extends Controller
{
    public function getRegister(){
        return view('register');
    }
 
    public function postRegister(RegisterRequest $request){
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role' => '1',
                'status' => '0',
            ]);
            if (!empty($user)) {
                $message = "Registration successfully";
                    return redirect('/login')->with('success_msg', $message);
            }
        } catch (\Exception $e) {
             $message = "Registration not successfully";
            return redirect('/register')->with('error_msg', $message);
        }
    }
}