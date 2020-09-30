<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(Request $request){
        $userDetails = User::select('id','name','email')->where('id',$request->id)->first();
        return view('edit',['userDetails'=>$userDetails]);
    }

    public function store(Request $request)
    {

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'role' => '1',
                'status' => '0',
            ]);
            if (!empty($user)) {
                $message = "User  created successfully";
                    return redirect('/home')->with('success_msg', $message);
            }
            else
            {
                $message = "User not created successfully";
                return redirect('/home')->with('error_msg', $message);   
            }
        
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $isUpdated = User::where('id',$request->id)->update(['name'=>$request->name,'email'=>$request->email]);
        if($isUpdated){
               $message = "User detials update successfully";
                    return redirect('/home')->with('success_msg', $message);

        }else{
            $message = "User detials not update successfully";
                    return redirect('/home')->with('error_msg', $message);
        }

    }

    public function delete(Request $request){
        $isDeleted = User::where('id',$request->id)->delete();
        if($isDeleted){
            $message = "User deleted successfully";
            return redirect('/home')->with('success_msg', $message);
        }else{
            $message = 'User not deleted successfully';
            return redirect('/home')->with('error_msg', $message);
        }
    }

    public function StatusUpdate(Request $request){
        $isUpdate = User::where('id',$request->id)->update(['status'=> $request->status]);
        if($isUpdate){
            if($request->status == '1')
            {
                $message = "User approved successfully";
            }
            if($request->status == '0')
            {
                $message = "User unapproved successfully";
            }
            return redirect('/home')->with('success_msg', $message);
        }else{
            $message = 'User not approved successfully';
            return redirect('/home')->with('error_msg', $message);
        }
    }


}