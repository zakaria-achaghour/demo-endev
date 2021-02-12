<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantSessionMarkdown;
use App\Role;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDF;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $users = User::with(['roles' => function($q){
        //      $q->where('name', 'participant');
        //  }])->get();
        // Role::with('users')->where('name', 'admin')->get();

        // get role
        $role = Role::where('name','participant')->first();

       /* $sessions= Session::with('users'); 
        dd($sessions); 
        $users = $sessions->users;
      */
       
       
        //dd($role->users()->with('sessions'));
        return view('participant.index',[
            'participants'=>$role->users
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sessions = Session::orderByDesc('date_start')->has('formations')->get();
        return view('participant.create',[
            
            'sessions'=>$sessions
            
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           

            $data = $request->except(['_token','avance','reste','session']);
            //dd($data);
           /* $data['cin'] = $request->input('cin');
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['birthday'] = $request->input('birthday');
            $data['phone'] = $request->input('phone');*/
            $data['password'] = Hash::make('password');
            $user = User::create($data);

            $data2['session_id'] = $request->input('session');
            $data2['avance'] = $request->input('avance');
            $data2['reste'] = $request->input('reste');
            
            $role = Role::where('name','participant')->first();
            $user->roles()->sync($role);
            $user->sessions()->syncWithoutDetaching([$data2['session_id']=>['reste'=>$data2['reste'],'avance'=>$data2['avance']]]);

           
         foreach ($user->sessions as $session) {
            foreach ($session->formations as  $formation) {
               $designation = $formation->designation;
               $formation = $formation;
               
            }
        }
       
      // $this->generateRecuInscription($user,$data2['reste'],$data2['avance'],$formation);
        // todo : Send Email To User include cin&password
        Mail::to($user->email)->send(new ParticipantSessionMarkdown($user,$designation));
        return redirect()->route('participants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('participant.show',['participant'=>User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
       
       // dd($user->sessions()->get()[0]->pivot->avance);
       $sessions = Session::orderByDesc('date_start')->has('formations')->get();
       // dd($user->sessions);
        return view('participant.edit',[
            'participant' => $user , 
            'session' =>  $user->sessions()->get()[0],
            'sessions' =>$sessions
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
       // dd(User::find($id)->sessions->pivot->avance);
        $participant = User::find($id);
        //$data = $request->except(['_token']);
        $participant->name = $request->input('name');
        $participant->email = $request->input('email');
        $participant->birthday = $request->input('birthday');
        $participant->phone = $request->input('phone');
        $participant->cin = $request->input('cin');
        $participant->save();
        $participant->sessions()->detach();
        $participant->sessions()->attach([$id=>['reste'=>$request->input('reste'),'avance'=>$request->input('avance')]]);
       

        return redirect()->route('participants.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {  
        $user = User::find($id);
        $user->sessions()->detach();
        $user->roles()->detach();
        $user = User::destroy($id);
       
        
        return redirect()->route('participants.index');

    }


    public function generateRecuInscription($id)
    {
        
       $participant = User::findOrFail($id);
       
       $session = $participant->sessions()->get()[0];
       
       $reste =  $session->pivot->reste;
       $avance =  $session->pivot->avance;
     // $formation = $session->formation;
      foreach ($participant->sessions as $session) {
        foreach ($session->formations as  $formation) {
           $designation = $formation->designation;
           $formation = $formation;
           
        }
    }
       
     
        $pdf = PDF::loadView('fichier.recu', [
            'participant' => $participant,
            'reste' => $reste,
            'avance' => $avance,
            'formation' =>$formation
        ]);
        return $pdf->download($participant->name.'.pdf');
       
    }
}
