<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Others;
use App\Models\Category;
use App\Models\Files;
use App\Models\Members;
use App\Models\CoAuthors;
use App\Models\Suggestions;

class HomeController extends Controller
{

    public function guest() {
        if(Auth::check()) {
            return redirect('/dashboard');
        }
        else {
            $recent_files = Files::where(['status' => 1])->orderBy('first', 'DESC')->limit(4)->get();
        
            $files = Files::where(['archive' => null])->where(['status' => 1])->orderBy('ordinance_title', 'ASC')->get();
    
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
    
            return view('guest', compact('files', 'recent_files', 'members'));
        }
        
    }

    public function home()
    {

        if(Auth::user()->type == 1) {
            foreach(Others::get() as $others) {
                $vision = $others->vision;
                $mission = $others->mission;
            }
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
            $getfiles = Files::where(['archive' => null])->orderBy('ordinance_title', 'ASC')->limit(10)->get();
            $users = User::where(['type' => 1])->count();
            $categories = Category::count();
            $files = Files::where(['archive' => null])->count();
            $sbmembers = Members::where(['status' => 1])->count();
        }
        if(Auth::user()->type == 0) {
            foreach(Others::get() as $others) {
                $vision = $others->vision;
                $mission = $others->mission;
            }
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
            $getfiles = Files::where(['archive' => null])->orderBy('ordinance_title', 'ASC')->limit(10)->get();
            $users = User::where(['type' => 1])->count();
            $categories = Category::count();
            $files = Files::where(['archive' => null])->count();
            $sbmembers = Members::where(['status' => 1])->count();
        }

        return view('dashboard', compact('users', 'categories', 'files', 'vision', 'members', 'mission', 'getfiles', 'sbmembers'));
    }

    public function allusers() {

        if(Auth::user()->type == 1) {
            $users = User::where(['type' => 1])->orderBy('name', 'ASC')->get();
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
            return view('laravel-examples.admin-management', compact('users', 'members'));
        }
        else {
            $home = new HomeController;
            return $home->home();
        }

    }
    public function electedOfficials() {

        $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

        if(Auth::user()->type == 1) {
            $sbmembers = Members::orderBy('status', 'DESC')->orderBy('position', 'ASC')->get();
        }
        if(Auth::user()->type == 0) {
            $sbmembers = Members::orderBy('status', 'DESC')->orderBy('position', 'ASC')->get();
        }

        return view('elected-officials', compact('members', 'sbmembers'));

    }
    public function filemanager(Request $request) {

         $folderid = $request->id;

         $countfiles = Files::where(['archive' => null])->get();

        if(Auth::user()->type == 1) { 

            if($folderid == 0) {

                $category = Category::where(['parent_id' => $folderid])->orderBy('category', 'ASC')->get();

                $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

                $coauthors = CoAuthors::get();
                    
                return view('file-manager', compact('coauthors', 'category', 'folderid', 'countfiles', 'members'));

            }
            if($folderid != 0) {

                $category = Category::where(['parent_id' => $folderid])->orderBy('category', 'ASC')->get();

                $files = Files::where(['folder_id' => $folderid])->where(['archive' => null])->orderBy('ordinance_title', 'ASC')->get();
                
                $get = Category::where(['id' => $folderid])->get();

                $authors = Members::orderBy('from_year', 'DESC')->get();

                foreach($get as $get) { $foldername = $get->category; break; }

                $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

                $coauthors = CoAuthors::get();

                return view('file-manager', compact('coauthors', 'category', 'folderid', 'foldername', 'files', 'authors', 'countfiles', 'members'));

            }
        }

        if(Auth::user()->type == 0) { 

            if($folderid == 0) {

                $category = Category::where(['parent_id' => $folderid])->orderBy('category', 'ASC')->get();

                $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

                $coauthors = CoAuthors::get();

                return view('file-manager', compact('coauthors', 'category', 'folderid', 'countfiles', 'members'));

            }
            if($folderid != 0) {

                $category = Category::where(['parent_id' => $folderid])->orderBy('category', 'ASC')->get();

                $files = Files::where(['folder_id' => $folderid])->where(['archive' => null])->orderBy('ordinance_title', 'ASC')->get();
                
                $get = Category::where(['id' => $folderid])->get();

                $authors = Members::orderBy('from_year', 'DESC')->get();

                foreach($get as $get) { $foldername = $get->category; break; }

                $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

                $coauthors = CoAuthors::get();

                return view('file-manager', compact('coauthors', 'category', 'folderid', 'foldername', 'files', 'authors', 'countfiles', 'members'));

            }
        }

    }

    public function allfiles() {

        if(Auth::user()->type == 1) {

            $files = Files::where(['archive' => null])->orderBy('ordinance_title', 'ASC')->get();

            $authors = Members::orderBy('from_year', 'DESC')->get();

            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

            $coauthors = CoAuthors::get();
        }

        if(Auth::user()->type == 0) {

            $files = Files::where(['archive' => null])->orderBy('ordinance_title', 'ASC')->get();

            $authors = Members::orderBy('from_year', 'DESC')->get();

            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

            $coauthors = CoAuthors::get();
        }

        return view('all-files', compact( 'files', 'authors', 'members', 'coauthors'));

    }

    public function archives() {

        if(Auth::user()->type == 1) {

            $files = Files::where(['archive' => 1])->orderBy('ordinance_title', 'ASC')->get();

            $authors = Members::orderBy('from_year', 'DESC')->get();

            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();

            $coauthors = CoAuthors::get();

            return view('archives', compact( 'files', 'authors', 'members', 'coauthors'));
        }
    }

    public function suggestions() {

        if(Auth::user()->type == 1) { 
            $suggestions = Suggestions::orderBy('created_at', 'DESC')->get();
            $members = Members::where(['status' => 1])->orderBy('position', 'ASC')->get();
            return view('suggestions', compact('suggestions', 'members'));
        }

    }
}
