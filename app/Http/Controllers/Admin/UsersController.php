<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
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
        return view('admin.users.index',['users'=>User::all()]);
    }

    

    /**
     * Show the form for create the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $this->authorize('create',$user);
        $roles=Role::all();
        return view('admin.users.create',[
            'user' =>$user,
            'roles' => $roles
        ]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $data = $request->only(['name','email']);
        $data['password'] = Hash::make('password');
        $user = User::create($data);
        $user->roles()->sync($request->roles);
        if($user){
            $request->session()->flash('success' , 'User created  ');
        }else{
            $request->session()->flash('error' , 'Error creating user !! ');
        }
        
        return redirect()->route('admin.users.index');
       
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('edit',$user);

        $roles=Role::all();
        
        return view('admin.users.edit',[
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->roles()->sync($request->roles);
        if($user->save()){
            $request->session()->flash('success' , 'User Updated !! ');
        }else{
            $request->session()->flash('error' , 'Error Updating user !! ');
        }
       
        

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Request $request)
    {
        $this->authorize('delete',$user);

        
        if($user->delete()){
            $request->session()->flash('success' , 'User deleted  ');
        }else{
            $request->session()->flash('error' , 'Error deleting user !! ');
        }
        return redirect()->route('admin.users.index');

    }
}
