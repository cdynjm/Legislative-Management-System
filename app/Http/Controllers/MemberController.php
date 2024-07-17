<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;

use App\Models\Members;
use App\Models\User;


class MemberController extends Controller
{
    public function create(Request $request) {

        foreach(User::get() as $get) {
            if($get->email == $request->email) {
                return response()->json(['Error' => 1, 'Message'=> 'Email is already taken']);
            }
        }

        $datetime = date('Ymd-His');

        $profilename = \Str::slug($request->lastname.'-'.$datetime).'.'.$request->photo->extension(); 
        $transferfile = $request->file('photo')->storeAs('public/photo/', $profilename);

        $get = Members::create([
            'admin_id' => Auth::user()->id,
            'name' => $request->lastname." ".$request->firstname,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'civil_status' => $request->civil,
            'position' => $request->position,
            'gender' => $request->gender,
            'status' => $request->status,
            'from_year' => $request->from_year,
            'to_year' => $request->to_year,
            'photo' => $profilename
        ]);

        User::create([
            'userid' => $get->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_id' => Auth::user()->id,
            'type' => 0
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Member Created Successfully']); 
    }

    public function update(Request $request) {

        if(empty($request->file('photo'))) {

            if(empty($request->password)) {

                try {
                    User::where(['userid' => $request->memberid])
                    ->update([
                        'email' => $request->email
                    ]);
                } 

                catch (QueryException $e){
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        return response()->json(['Error' => 1, 'Message' => 'Email is already taken']);
                    }
                }

                Members::where(['id' => $request->memberid])
                        ->update([
                            'name' => $request->name,
                            'birthdate' => $request->birthdate,
                            'address' => $request->address,
                            'civil_status' => $request->civil,
                            'position' => $request->position,
                            'gender' => $request->gender,
                            'status' => $request->status,
                            'from_year' => $request->from_year,
                            'to_year' => $request->to_year,
                        ]);
            }
            else {

                try {
                    User::where(['userid' => $request->memberid])
                        ->update([
                            'email' => $request->email,
                            'password' => Hash::make($request->password)
                        ]);
                    } 
    
                    catch (QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        if($errorCode == 1062){
                            return response()->json(['Error' => 1, 'Message' => 'Email is already taken']);
                        }
                    }

                Members::where(['id' => $request->memberid])
                        ->update([
                            'name' => $request->name,
                            'birthdate' => $request->birthdate,
                            'address' => $request->address,
                            'civil_status' => $request->civil,
                            'position' => $request->position,
                            'gender' => $request->gender,
                            'status' => $request->status,
                            'from_year' => $request->from_year,
                            'to_year' => $request->to_year,
                        ]);
            }
        }

        if(!empty($request->file('photo'))) {

            if(empty($request->password)) {

                try {
                    User::where(['userid' => $request->memberid])
                    ->update([
                        'email' => $request->email
                    ]);
                } 

                catch (QueryException $e){
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        return response()->json(['Error' => 1, 'Message' => 'Email is already taken']);
                    }
                }

                File::delete(public_path('storage/photo/'.$request->oldphoto.''));

                $datetime = date('Ymd-His');

                $profilename = \Str::slug($request->name.'-'.$datetime).'.'.$request->photo->extension(); 
                $transferfile = $request->file('photo')->storeAs('public/photo/', $profilename);

                Members::where(['id' => $request->memberid])
                ->update([
                    'name' => $request->name,
                    'birthdate' => $request->birthdate,
                    'address' => $request->address,
                    'civil_status' => $request->civil,
                    'position' => $request->position,
                    'gender' => $request->gender,
                    'status' => $request->status,
                    'from_year' => $request->from_year,
                    'to_year' => $request->to_year,
                    'photo' => $profilename
                ]);
            }
            else {

                try {
                    User::where(['userid' => $request->memberid])
                    ->update([
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
                    ]);
                } 

                catch (QueryException $e){
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        return response()->json(['Error' => 1, 'Message' => 'Email is already taken']);
                    }
                }

                File::delete(public_path('storage/photo/'.$request->oldphoto.''));

                $datetime = date('Ymd-His');

                $profilename = \Str::slug($request->name.'-'.$datetime).'.'.$request->photo->extension(); 
                $transferfile = $request->file('photo')->storeAs('public/photo/', $profilename);

                Members::where(['id' => $request->memberid])
                ->update([
                    'name' => $request->name,
                    'birthdate' => $request->birthdate,
                    'address' => $request->address,
                    'civil_status' => $request->civil,
                    'position' => $request->position,
                    'gender' => $request->gender,
                    'status' => $request->status,
                    'from_year' => $request->from_year,
                    'to_year' => $request->to_year,
                    'photo' => $profilename
                ]);
            }
        }

        return response()->json(['Error' => 0, 'Message'=> 'Member Updated Successfully']); 
    }

    public function delete(Request $request) {

        Members::where(['id' => $request->memberid])->delete();

        File::delete(public_path('storage/photo/'.$request->photo.''));

        return response()->json(['Error' => 0, 'Message'=> 'SB Member Deleted Successfully']); 

    }
}
