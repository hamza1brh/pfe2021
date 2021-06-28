<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser ;
use App\Models\User ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role ;
use App\Models\Profile ;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest ;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view ('admin.users.index' , ['users' => User::paginate(10)] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.create', ['roles' => Role::all()] ) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        // $validatedData = $request->validated();
        // $user = User::create($validatedData);

        $newUser =  new CreateNewUser();
        // $user =$newUser->create($request->only(['name', 'email','phone_num','address', 'password', 'password_confirmation']));
        $user = $newUser->create($request->all());
       
        $user->address = $request->input('address');
        $user->phone_num = $request->input('phone_num');
        $user->roles()->sync($request->roles);

        //**** create a new profile with every created user */
        $profile = new Profile();
        $profile->user()->associate($user);
        // dd($profile);
        $profile->save();
       
        $request->session()->flash('success', 'You have created the user');



        return redirect( route('admin.users.index'));
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
    
        return view('admin.users.edit', [
            'roles'=>Role::all(),
            'user' =>User::find($id)
        ]);
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
            $request->session()->flash('error', 'You cannnot edit this user');
                return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);


        $request->session()->flash('success', 'You have edited the user');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        User::destroy($id);
        $request->session()->flash('success', 'You have deleted the user');
        return redirect(route('admin.users.index'));
    }   
}
