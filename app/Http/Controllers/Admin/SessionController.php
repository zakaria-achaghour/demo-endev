<?php



namespace App\Http\Controllers\Admin;

use App\Exports\UsersExportView;
use App\Formation;
use App\Http\Controllers\Controller;
use App\Role;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Response;
use DataTables;
class SessionController extends Controller
{

    public function exporter_view($id)
     {
        
       
        return Excel::download(new UsersExportView($id), 'users.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $sessions = Session::orderByDesc('date_start')->with('formations')->withCount('users')->get();
      
      
        

        

        // $users = DB::table('users')
        // ->join('session_user','users.id','session_user.user_id')
        // ->where('status','demande')
        // ->get(); 
       // $sessions  = DB::table('sessions')->where('status','en course');
       
     
      //dd(Session::withCount('formations')->with('formations')->get());
        return view('admin.sessions.index',[
            'sessions' => $sessions
       ]);
    }

    
    
    public function tableContent(Request $request)
    {
       
        $var = $request->input('status');
        if($var == 'en cours'){
            $sessions = Session::orderByDesc('date_start')->where('status','en cours')->with('formations')->withCount('users')->get();
          
       }elseif ($var == 'pas en cours') {
            $sessions = Session::orderByDesc('date_start')->where('status','pas en cours')->with('formations')->withCount('users')->get();
           
       }elseif ('fini') {
           $sessions = Session::orderByDesc('date_start')->where('status','fini')->with('formations')->withCount('users')->get();

       }else{
           $sessions = Session::orderByDesc('date_start')->with('formations')->withCount('users')->get();
      
       }


      
     
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
        // $users = DB::table('users')
        // ->join('session_user','users.id','session_user.user_id')
        // ->where('status','demande')
        // ->get(); 

        $session = Session::findOrFail($id); 
        $users = $session->users;
       $formation = $session->formations()->first();
     // dd($formation);

        return view('admin.sessions.show',[
            'session' => $session,
            'users' => $users,
            'formation' => $formation
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
