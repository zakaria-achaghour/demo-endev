<?php



namespace App\Http\Controllers\Admin;

use App\Formation;
use App\Http\Controllers\Controller;
use App\Role;
use App\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nombre_demande(){
        
    }
    public function index()
    {

        $sessions = Session::orderByDesc('date_start')->with('formations')->withCount('users')->get();
       // dd($sessions);
       
      //dd(Session::withCount('formations')->with('formations')->get());
       return view('admin.sessions.index',[
           'sessions' => $sessions
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::where('name','participant')->first();
        
        return view('admin.sessions.create',[
            'formations'=>Formation::all()
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
        
        $data = $request->except(['_token']);
     
       
        $session = new Session();
        $session->name = $data['name'];
        $session->date_start = $data['date_start'];
        $session->status = $data['status'];
        $session->save();
        foreach ($data['formations'] as $key => $value) {
            $session->formations()->syncWithoutDetaching($value);
        }

       return redirect()->route('admin.sessions.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $session = Session::find($id);
        
        $formation_id=$session->formations->first();
        //dd($formation_id->id);
        //dd($session->formations->first());
        /*$tab = [];
        foreach ($session->formations() as $formation) {
           $tab +=$formation->id;
        }

        dd($tab);*/
      
        /*$id_formations=[];
        foreach ($session->formations as $key => $formation) {
            $id_formations [$key]=$formation->id;
        }*/
       

        return view('admin.sessions.edit',[
            'session'=>$session,
            'formations'=>Formation::all()
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
        $data = $request->except(['_token']);
     
       
        $session = Session::find($id);
        $session->name = $data['name'];
        $session->date_start = $data['date_start'];
        $session->status = $data['status'];
        $session->save();
        $session->formations()->detach();
        foreach ($data['formations'] as $key => $value) {
            $session->formations()->attach($value);
        }

       return redirect()->route('admin.sessions.index');  
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
