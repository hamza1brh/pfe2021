<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
       return view('user.profile'  , ['user'=> $user] ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::find($id);
        $current = Auth::user();
        // only admins are allowed to see others users basic profiles
        if ( $current->hasRole('admin') )
        {
            return view('user.profile', [
                'user' => User::findOrFail($id)]);
        }

        // users are allowed to see instructors profiles 
        // if ( $user->hasRole('instructor') )
        // {
        //     return view ( 'user.Iprofile' , [ 'user' => User::findOrFail($id) ]   );
        // }

        return redirect()-> Route('user.profile.index' ,auth()->user()->id  ) ;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        // only admins are allowed to Edit others users basic profiles
        if ( $user->hasRole('admin') )
        {
            return view('user.edit', [
                'roles'=>Role::all(),
                'user' =>User::find($id)
            ]);
        }


        // if user is not an admin they cant edit other users
        return view('user.edit' ,[                          
            'user'=> $user,
            'roles'=> Role::all()
            ]) ;



        // return view('user.edit', [
        //     'roles'=>Role::all(),
        //     'user' =>User::find($id)
        // ]);
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
        
        $user = User::find($id);
        if ( !$user )
        {
            $request->session()->flash('error', 'an error occurred !!profile not edited');
                return redirect(route('user.profile.index'));
        }

        //updating user fields in the data base
        $user->update($request->except(['_token', 'roles']));
        // $user->roles()->sync($request->roles);



        //updating the profile fields in the data base

        $user->profile->title = $request->input('title');
        if ($request->path == null  )
        {
            $user->push();
            $request->session()->flash('success', 'You have successfully edited your profile');
            return redirect(route('user.profile.show' , $user->id));
        }
        $user->profile->path = Storage::disk('public')->put('avatars', $request->path);
        
        $user->push();

        // if(auth::user()->hasRole('admin'))
        // {
        //     $request->session()->flash('success', 'You have successfully edited this profile');
        //     return redirect(route('user.profile.index'));
        // }

        $request->session()->flash('success', 'You have successfully edited your profile');
        return redirect(route('user.profile.show', $user->id));

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
