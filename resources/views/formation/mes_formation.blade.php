@extends('layouts.app')
 
@section('content')
<div class="container  text-center mt-1 w-60">
    <h4 class="m-2 text-muted">Mes Formations</h4>
    <hr>
</div>
<div class="container my-2 text-center">

  @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
  @endif
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
                  @if(!$reste)
                  <form style="display: inline"   method="POST"
                                class="fm-inline"
                                action="{{ route('demande_attestation', ['formation' => $formation->id]) }}">
                                @method('PUT')
                                @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" >Demande</button>
                                    </form> 
               
                   @endif
                </div>
            </div>
            @endforeach
            </div>    
          </div>
        </div>
    
	       

@endsection

