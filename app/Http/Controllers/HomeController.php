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
        return view('admin.home');
    }

    public function getPackage(){
        $packages = Package::getPackages();
        return view('welcome',compact('packages'));
    }

    public function search(){
        $search  = Input::get('search') ;
        $packages = Package::getPackages();
        return view('list',compact('packages'));
    }
}
