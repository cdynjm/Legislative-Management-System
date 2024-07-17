<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use App\Models\User;

class RegisterController extends Controller
{
    public function create(Request $request)
    {

        foreach(User::get() as $get) {
            if($get->email == $request->email) {
                return response()->json(['Error' => 1, 'Message'=> 'Email is already taken']);
            }
        }

        User::create([
            'name' => $request->lastname." ".$request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'location' => $request->address,
            'about_me' => null,
            'admin_id' => 0,
            'type' => 1
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Admin Account Created Successfully']); 
       
    }

    public function update(Request $request) {    

        try {
            if(empty($request->password)) {
                User::where(['id' => $request->userid])
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'location' => $request->address
                ]);
            }
            else {
                User::where(['id' => $request->userid])
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'location' => $request->address
                ]);
            }
        }

        catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return response()->json(['Error' => 1, 'Message' => 'Email is already taken']);
            }
        }

        return response()->json(['Error' => 0, 'Message'=> 'Admin Updated Successfully']); 

    }

    public function delete(Request $request) {

        User::where(['id' => $request->userid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'User Deleted Successfully']); 

    }
}
