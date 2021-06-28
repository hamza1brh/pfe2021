<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser ;
use App\Models\User ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role ;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest ;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $users = User::all();
        // foreach( $users as $user )
        // {
        //     if ( $user->hasRole('instructor') )
        //     {
        //         $instructors[]= $user ;
        //     }
        // }


        // $instructors = User::whereHas(
        //     'roles' , function($q){
        //         $q->where ('name', 'instructor');
        //     }
        // )->get();
        

        // foreach ($instructors as $key => $value) {
        //     $instructors['instructors'][$key] = (object) $value;
        // }

   
        // dd($instructors);

     
        return view ('admin.instructors.index' , ['users' => User::all() ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructors.create', ['roles' => Role::all()]  ) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
