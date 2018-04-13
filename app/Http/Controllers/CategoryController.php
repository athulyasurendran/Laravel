<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
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
        return view('admin.category.index', compact('categories'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', compact('categories'));
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
            // 'name' => 'required|min:3|max:35',
            // 'slug' => 'required|unique:slugs,name',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ],[
            // 'name.required' => ' The first name field is required.',
            // 'name.min' => ' The first name must be at least 5 characters.',
            // 'name.max' => ' The first name may not be greater than 35 characters.',
            
        ]);
        $insert = Category::saveCategory($request);
        Session::flash('message', 'Category added Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route('category.index');
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
        $saved_category = Category::getbyId($id);

        if(!($saved_category) || empty ($saved_category)){
            Session::flash('message', 'Item could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('category.index');
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
        
        return view('admin.category.create', compact('categories','saved_category'));
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
        $saved_category = Category::getbyId($id);

        $slug_id = 0;
        

        if(!($saved_category) || empty ($saved_category)){
            Session::flash('message', 'Item could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('category.index');
        }

        
        $slug_id = $saved_category->slug_id;
        
        
        $this->validate($request,[
            'name' => 'required|min:3|max:35',
            'slug' => 'required|unique:slugs,name,'.$slug_id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ],[
            'name.required' => ' The first name field is required.',
            'name.min' => ' The first name must be at least 5 characters.',
            'name.max' => ' The first name may not be greater than 35 characters.',
            
        ]);

        $insert = Category::updateCategory($request,$id);
        Session::flash('message', 'Category updated Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        
        return redirect()->route('category.index');
        
        

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
