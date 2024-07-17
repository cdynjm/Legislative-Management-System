<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Models\Others;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        $vision = '';
        $mission = '';
        foreach(Others::get() as $others) {
            $vision = $others->vision;
            $mission = $others->mission;
        }

        if(Auth::user()->type == 1) {
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
        }

        if(Auth::user()->type == 0) {
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
        }

        return view('laravel-examples/user-profile', compact('vision', 'mission', 'members'));
    }

    public function store(Request $request)
    {
        if(Auth::user()->type == 1) {

            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
                'phone'     => ['max:50'],
                'location' => ['max:70'],
                'about_me'    => ['max:150'],
            ]);
            if($request->get('email') != Auth::user()->email)
            {
                if(env('IS_DEMO') && Auth::user()->id == 1)
                {
                    return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                    
                }
                
            }
            else{
                $attribute = request()->validate([
                    'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
                ]);
            }
            
            if(empty($request->password)) {
                User::where('id',Auth::user()->id)
                ->update([
                    'name'    => $attributes['name'],
                    'email' => $attributes['email'],
                    'phone'     => $attributes['phone'],
                    'location' => $attributes['location'],
                    'about_me'    => $attributes["about_me"],
                ]);
            }
            else {
                User::where('id',Auth::user()->id)
                ->update([
                    'name'    => $attributes['name'],
                    'email' => $attributes['email'],
                    'phone'     => $attributes['phone'],
                    'password' => Hash::make($request->password),
                    'location' => $attributes['location'],
                    'about_me'    => $attributes["about_me"],
                ]);

            }

            if(Auth::user()->type == 1) {
                Others::where(['admin_id' => Auth::user()->id])
                ->update([
                    'vision' => $request->vision,
                    'mission' => $request->mission
                ]);
            }
        }

        if(Auth::user()->type == 0) {

            $attributes = request()->validate([
                
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
                
            ]);
            if($request->get('email') != Auth::user()->email)
            {
                if(env('IS_DEMO') && Auth::user()->id == 1)
                {
                    return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                    
                }
                
            }
            else{
                $attribute = request()->validate([
                    'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
                ]);
            }
            
            if(empty($request->password)) {
                User::where('id',Auth::user()->id)
                ->update([
                    'email' => $attributes['email'],
                    
                ]);
            }
            else {
                User::where('id',Auth::user()->id)
                ->update([
                    'email' => $attributes['email'],
                    'password' => Hash::make($request->password)
                ]);
            }
        }

        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
