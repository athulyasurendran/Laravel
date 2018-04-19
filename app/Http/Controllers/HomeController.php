<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
        $packages = Package::getPackages();
        return view('welcome',compact('packages'));
    }

    public function search(){
        $latitude  = Input::get('latitude');
        $longitude  = Input::get('longitude');
        $packages = Package::searchPackages($latitude, $longitude);
        return view('list',compact('packages'));
    }

    public function detail(){
        $package = Package::getbyId(3);
        return view('list-detail',compact('package'));
    }
}
