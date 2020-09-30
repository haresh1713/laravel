<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Middleware\UserAuth;

class HomeController extends Controller
{
   public function home(Request $request){
   	   $Adminrole = $request->session()->get('role');  	
       $users = User::select('id','name','email','status')->where('role','!=','0')->get();
       return view('home',['users'=>$users,'Adminrole' => $Adminrole]);
   }

   public function adduser(Request $request)
   { 	
		return view('adduser');
   }
}