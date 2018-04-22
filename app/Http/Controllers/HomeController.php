<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('admin.index');
    }

    public function getPackage(){
        return $this->checkRole();
    }

    public function search(){
        $latitude  = Input::get('latitude');
        $longitude  = Input::get('longitude');
        $packages = Package::searchPackages($latitude, $longitude);
        return view('list',compact('packages'));
    }

    public function detail($id){
        $package = Package::getbyId($id);
        return view('list-detail',compact('package'));
    }

    public function detailCat($id){
        $package = Package::getbyId(1);
        return view('list-detail',compact('package'));
    }

    public function checkRole(){
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        if($currentuser->role == "user"){
            $packages = Package::getPackages();
            return view('welcome',compact('packages'));
        }else{
            return $this->index();
        }
    }
}
