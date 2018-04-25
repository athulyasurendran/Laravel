<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;
use App\Category;
use App\Http\Controllers\HomeController;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(HomeController $homeCtrl)
    {
        $this->middleware('auth');
        $this->homeCtrl = $homeCtrl;
        return $this->homeCtrl->checkRole();
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
        $categories_tree = Category::tree();
        $categories[0]='None';
        if(!empty($categories_tree)){
            foreach ($categories_tree as $categories_val){
                $categories[$categories_val->id]=$categories_val->name;
                if(!empty($categories_val['children'])) {
                    foreach ($categories_val['children'] as $categories_val1){
                        $categories[$categories_val1->id]=$categories_val->name.' -> '.$categories_val1->name;
                    }
                }
            }
        }

        return view('admin.package.create', compact('categories'));
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
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'profileimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            // 'icon' => 'icon|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ],[
            'title.required' => 'Name field is required.',
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

        $categories_tree = Category::tree();
        $categories[0]='None';
        if(!empty($categories_tree)){
            foreach ($categories_tree as $categories_val){
                $categories[$categories_val->id]=$categories_val->name;
                if(!empty($categories_val['children'])) {
                    foreach ($categories_val['children'] as $categories_val1){
                        $categories[$categories_val1->id]=$categories_val->name.' -> '.$categories_val1->name;
                    }
                }
            }
        }

       $packages = Package::getPackages();
        
        return view('admin.package.create', compact('packages','saved_package','categories'));
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

        if(!($saved_package) || empty ($saved_package)){
            Session::flash('message', 'Item could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('package.index');
        }
        
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'profileimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            // 'icon' => 'icon|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ],[
            'title.required' => 'Name field is required.',
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
