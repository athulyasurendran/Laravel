<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Member;
use Session;

class MemberController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::all();
        return view('admin.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => bcrypt($request->password),
        ]);

        Session::flash('message', 'Member added Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('member.index');
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
        $saved_member = User::find($id);
        $member = User::find($id);
        
        if(!($saved_member) || empty ($saved_member)){
            Session::flash('message', 'Member could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('member.index');
        }

        return view('admin.member.create', compact('member', 'saved_member'));
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

        $member = User::find($id);

        if(!($member) || empty ($member)){
            Session::flash('message', 'Member could not be found!'); 
            Session::flash('alert-class', 'alert-danger');
       
            return redirect()->route('member.index');
        }

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);
        
        $member = Member::updateMember($request, $id);
        Session::flash('message', 'Member Updated Successfully!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('member.index');
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
