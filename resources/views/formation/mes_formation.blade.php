@extends('layouts.app')
 
@section('content')
<div class="container  text-center mt-1 w-60">
    <h4 class="m-2 text-muted">Mes Formations</h4>
    <hr>
</div>
<div class="container">
	 <div class="row">
        
            <div class="col-sm-6 mb-3 mx-auto">
              <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for names..">
            </div>
     </div>
          <div class="row text-center" id="myItems">
            <div class="col-sm-6 mb-3 mx-auto">
                @foreach ($formations as $formation)
                    
               
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><a href="#">{{ $formation->designation }}</a></h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $formation->ref }}</h6>
                  <p class="card-text">{{ $formation->prix }}.00 MAD</p>
                  

                </div>
                <div class="card-footer">
                    <div class="btn btn-outline-danger">Get Attestation</div>
                </div>
            </div>
            @endforeach
            </div>    
          </div>
        </div>
    
	       

@endsection

