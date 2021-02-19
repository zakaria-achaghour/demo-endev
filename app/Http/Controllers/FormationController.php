<?php

namespace App\Http\Controllers;

use App\Formation;
use App\Mail\DemandeAttestation;
use App\Role;
use App\User;
use DateTime;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
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
    public function mes_formations(){

            $user = Auth::user();
           //  $restes = $session->pivot->reste;
        foreach ($user->sessions as $session) {
            $formations = $session->formations; 
        }
        return view('formation.mes_formation',['formations'=>$formations,'user'=>$user]);
    }



    
    public  function demande_attestation($id){
        $user2 = User::with(['roles' => function($q){
            $q->where('name', 'admin');
        }])->first();
           
        $user = Auth::user();
      
        foreach ($user->sessions as $session) {
           foreach($session->formations as $formation){
                if($formation->id == $id ){
                    $designation = $formation->designation;
                    $ref = $formation->ref;
                    $user->sessions()->sync([$session->id=>['date_demande_attestion'=> new DateTime('today'),'status'=>'demande']]);

                     Mail::to($user2->email)->send(new DemandeAttestation($user,$designation,$ref));
                 return redirect()->back()->with('message', 'demande envoyé avec success');;
           }  
          
        }
       
    }

   
    }
    
  



    public function index()
    {
        
        return View('formation.index',[
            'formations'=>Formation::orderByDesc('created_at')->simplePaginate(6)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('formation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['designation' , 'prix' , 'vh','description']);
        $date = new DateTime('today');
        $data['ref'] = $data['designation'].'-'.$date->format('m-y');
        $formation = Formation::create($data);
        
         // add data to champs other
        // $data['slug']=Str::slug($data['title'],'-');
        
        $request->session()->flash('status' , 'formations created ');
        return redirect()->route('formations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
       return view('formation.show', [
        'formation' => Formation::find($id)
    ]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('formation.edit', [
            'formation' => Formation::findOrFail($id)
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
        $formation = Formation::findOrFail($id);
       
      
       
       $formation->designation = $request->input('designation'); 
       $formation->prix = $request->input('prix'); 
       $formation->vh = $request->input('vh'); 
       $formation->description = $request->input('description');
       $formation->save();

       $request->session()->flash('status' , 'formation updated ');

       return redirect()->route('formations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Formation::destroy($id);
      
        return redirect()->route('formations.index');
    }


}
