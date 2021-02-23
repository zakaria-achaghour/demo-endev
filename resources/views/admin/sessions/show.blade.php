@extends('layouts.app')

@section('content')

<div class="conatiner">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</div>

  
   

    <div  class="row justify-content-center ">
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Session</div>
                 <div class="card-body">
                   
              
           
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="name">Session name :</label>
                             <input type="text"  name="name" id="name" class="form-control text-center"  value="{{ $session->name }}" disabled>
                          
                           </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="date_debut">Date Debut</label>
                             <input type="text"  name="date_debut" id="date_debut" class="form-control text-center"  value="{{ $session->	date_start }}"  disabled>
                          
                           </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6 mx-auto">
                         <div class="form-group">
                             <label for="statu">Statu</label>
                             <input type="text"  name="statu" id="statu" class="form-control text-center"  value="{{ $session->status }}" disabled>
                          
                           </div>
                     </div>
                   
                 </div>
     
             </div>
         </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Formation</div>
                 <div class="card-body">
           
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="ref">référence :</label>
                             <input type="text"  name="ref" id="ref" class="form-control text-center"  value="{{ $formation->ref }}" disabled>
                          
                           </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="designation">désignation </label>
                             <input type="text"  name="designation" id="designation" class="form-control text-center"  value="{{ $formation->designation }}"  disabled>
                          
                           </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="prix">Prix</label>
                             <input type="text"  name="prix" id="prix" class="form-control text-center"  value="{{ $formation->prix }}" disabled>
                          
                           </div>

                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="vh">volume horaire</label>
                            <input type="text"  name="vh" id="vh" class="form-control text-center"  value="{{ $formation->vh }}" disabled>
                         
                          </div>
                          
                    </div>
                   
                 </div>
     
             </div>
         </div>
        </div>
        
    </div>
    
   <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
           
               @include('admin.sessions.users_session',$users)
    
               
                <div class="row">
                    <div class="col-md-6 ">
                       
                            <a href="{{ route('admin.exporter_view',['id'=>$session->id]) }}"   class="btn btn-success" style="width: 100%">Exporter </a>
                        
                         </div>
                         <div class="col-md-6 ">
                       
                            <a href="{{ route('admin.sessions.index') }}"   class="btn btn-warning" style="width: 100%">Retour </a>
                        
                         </div>
                        
                    </div>
                </div>
           
 
        
       
        </div>
        <div class="col-md-1"></div>
   </div>
      
@endsection
