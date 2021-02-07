<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('editeProfile',$user);

        return view('user.edit',[
            'user'=>$user
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
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->birthday = $request->input('birhtday');
        $user->save();
        
            $request->session()->flash('success' , 'Information  Updated  ');
       
        return redirect()->route('home');
        
    }

    public function change_password(Request $request , $id){
        $user = User::findOrFail($id);
        $newpass=$request->input('new-password');
        $confirmpass=$request->input('password-confirm');
        if (Hash::check($request->input('old-password'), $user->password)) {
            if($newpass === $confirmpass)
            {
                $user->password = Hash::make($request->input('new-password'));
                $user->save();
                 $request->session()->flash('success' , 'Password  Updated  ');
                return redirect()->route('home');
            }else{
                $request->session()->flash('error' , 'error password confirmation  ');
                return redirect()->back();
            }
        }else{
            $request->session()->flash('error' , 'error password not corrrect  ');
                return redirect()->back();
        }

    }
}
