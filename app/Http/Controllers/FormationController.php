<?php

namespace App\Http\Controllers;

use App\Formation;
use DateTime;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
           
        foreach ($user->sessions as $session) {
            $formations = $session->formations; 
        }
        return view('formation.mes_formation',['formations'=>$formations]);
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
        
        
        // Upload Picture for current Post
        // if($request->hasFile('picture')) {
           
        //    $path = $request->file('picture')->store('Formations');
        //   // $path = $request->file('picture')->storeAs('Formations',Str::slug($data['designation'],'-').'.'.$request->file('picture')->guessExtension());
        //     $image = new Image(['path' => $path]);
        //     $formation->image()->save($image);
        // }
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
    {// dd(Formation::findOrFail($id));
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
       
        // Upload Picture for current Post
        // if($request->hasFile('picture')) {
        //    $path = $request->file('picture')->store('Formations');
        //   if($formation->image){
        //       Storage::delete($formation->image->path);
        //    $formation->image->path = $path;
        //    $formation->image->save();
        //   }else{
        //    $formation->image()->save(Image::make(['path' => $path]));
           
        //   }
            
         
        // }
       
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
      //  $request->session()->flash('status' , 'formations deleted ');
        return redirect()->route('formations.index');
    }
}
