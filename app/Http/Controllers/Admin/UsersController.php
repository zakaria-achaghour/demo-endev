<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\Session;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use setasign\Fpdi\Fpdi;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function attestation(){
        $users = DB::table('users')
        ->join('session_user','users.id','session_user.user_id')
        ->where('status','demande')
        ->get();
    
        /**
         * session_id
         * status
         */
        return view('admin.users.attestation',['participants'=>$users]);
    }



    public function generate_attestation(Request $request){
       $data= $request->only(['session','participant']);
       $user = User::find($data['participant']);
       


      //  $user = DB::table('users')->where('id', )->first();
      // $user = User::find($request->input('participant'));
     //  dd($user);
       $session = Session::find($data['session'])->formations->first();
      
        
        // Create new Landscape PDF
        $pdf = new Fpdi('l');

        // Reference the PDF you want to use (use relative path)
        $pagecount = $pdf->setSourceFile('files/Attestation_Endev.pdf');

        // Import the first page from the PDF and add to dynamic PDF
        $tpl = $pdf->importPage(1);
        $pdf->AddPage();

        // Use the imported page as the template
        $pdf->useTemplate($tpl);    
        
        // Set the default font to use
        $pdf->SetFont('Helvetica');

        // adding a Cell using:
        //$pdf->Cell( $width, $height, $text, $border, $fill, $align);

            // First box - the user's Name
            $pdf->SetFontSize('22'); // set font size
            $pdf->SetXY(75, 108); //set the position of the box
            $pdf->Cell(160, 10, $user->name, 0, 0, 'C'); // add the text, align to Center of cell

             // the birthday
             $newDate = date("d-m-Y", strtotime($user->birthday));  
             $pdf->SetFontSize('14');
             $pdf->SetXY(108,118);
             $pdf->Cell(20, 10,$newDate , 0, 0, 'L');
             
            // the CIN , aligned to Left
            $pdf->SetFontSize('14');
            $pdf->SetXY(193,118);
            $pdf->Cell(20, 10,$user->cin, 0, 0, 'L');

  
            // Designation
            // note the reduction in font and different box position
             $pdf->SetFontSize('21');
             $pdf->SetXY(200,131.5);
             $pdf->Cell(150, 10, $session->designation, 0, 0, 'L');

           // Contenu de Formation
            // note the reduction in font and different box position

            $pdf->SetFontSize('20');
            $pdf->SetXY(90,146);
            $pdf->Cell(150, 10,$session->description, 0, 0, 'C');

         
           
        
            // render PDF to browser
            $pdf->Output();



    //     $user = User::find($id)->with(['sessions',''])
    //   dd($user);
       /* foreach ($user->sessions as $session) {
            foreach($session->formations as $formation){
                 if($formation->id == $id ){
                     $designation = $formation->designation;
                     $ref = $formation->ref;
                     $user->sessions()->sync([$session->id=>['reste'=>$session->pivot->reste,'avance'=>$session->pivot->avance,'date_demande_attestion'=> new DateTime('today'),'status'=>'demande']]);
 
                      Mail::to($user2->email)->send(new DemandeAttestation($user,$designation,$ref));
                  return redirect()->back();
            }  
           
         }*/
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
