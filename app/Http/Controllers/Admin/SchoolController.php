<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\School;
use App\Role;
use Gate;
use DB;

class SchoolController extends Controller
{
    //ensurin tat only autenticated users can view te pae
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::Oldest()->paginate(7);
        return \view('admin.school.index', compact('schools'))
        ->with('i', (\request()->input('page',1)-1)*7);
    }
    public function getAllSchools(){
         $schools= School::all();
         return \view('auth.register')->with('schools',$schools);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_name' => ['required', 'string', 'max:255'],
            'facultyId' => ['required', 'string', 'max:255'],
            'Details' => ['string', 'max:255'],
        ]);
        School::create($request->all());
        return \redirect()->route('admin.school.index')->
        with('Success','School created successifully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school,User $user)
    {
      
        
        //$roles = Role::all();
       $schools = School::all()->load('users');
        return view('admin.school.show',\compact('school','user'));//->with([
            //'user'=>$user,
            //'roles'=>$roles,
            //'schools' =>$schools

       // ]);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
        $user = User::all();
        $schools = School::all();
        return view('admin.school.edit')->with([
            'user'=>$user,
            
            'school' =>$school

        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
      


        $school->school_name = $request->school_name;
        $school->facultyId = $request->facultyId;
        $school->Details = $request->Details;
      
        $school->save();
        return \redirect()->route('admin.school.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school, User $user)
    {
       
        $user->schools()->detach();
        $school->delete();
        return \redirect()->route('admin.school.index');
    }
}
