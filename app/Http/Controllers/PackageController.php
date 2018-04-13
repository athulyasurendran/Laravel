<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         $packages = Package::getPackages();
         return view('admin.package.index',compact('packages'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            // 'title' => 'required|min:3|max:35',
            // 'slug' => 'required|unique:slugs,name',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            // 'icon' => 'icon|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ],[
            // 'name.required' => ' The first name field is required.',
            // 'name.min' => ' The first name must be at least 5 characters.',
            // 'name.max' => ' The first name may not be greater than 35 characters.',
            
        ]);
        $insert = Package::savePackage($request);
        Session::flash('message', 'Package added Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route('package.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saved_package = Package::getbyId($id);

        if(!($saved_package) || empty ($saved_package)){
            Session::flash('message', 'Item could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('package.index');
        }
        
       $packages = Package::getPackages();
        
        return view('admin.package.create', compact('packages','saved_package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $saved_package = Package::getbyId($id);

        $slug_id = 0;
        

        if(!($saved_package) || empty ($saved_package)){
            Session::flash('message', 'Item could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('package.index');
        }

        
        $slug_id = $saved_package->slug_id;
        
        
        $this->validate($request,[
            'name' => 'required|min:3|max:35',
            'slug' => 'required|unique:slugs,name,'.$slug_id,
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ],[
            'name.required' => ' The first name field is required.',
            'name.min' => ' The first name must be at least 5 characters.',
            'name.max' => ' The first name may not be greater than 35 characters.',
            
        ]);

       
        $insert = Package::updatePackage($request,$id);
        Session::flash('message', 'Package updated Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        
       return redirect()->route('package.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
