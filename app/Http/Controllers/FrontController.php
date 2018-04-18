<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
    
    public function theme()
    {
        return view('theme');
    }

    public function theme1($theme)
    {
        echo $theme;
    }
    public static function get_header()
    {
        echo view('layouts.header');
    }
}
