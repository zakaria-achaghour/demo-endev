@extends('layouts.app')

@section('content')

<div class="container  text-center mt-1 w-60">
    <h4 class="m-2 text-muted">Create Sessions</h4>
    <hr>
</div>
  
   

    <div  class="row justify-content-center">
        <div class="col-md-8">
        
            <div id="smartwizard">

                <ul class="nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#step-1">
                        Step 1
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#step-2">
                        Step 2
                      </a>
                    </li>
                 
                   
                </ul>
                <form  method="POST" action="{{ route('admin.sessions.store') }}" >
                    @csrf
                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                        <div class="card-body">

                            @include('admin.sessions.form')

                        </div>
                       
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                        <div class="card-body">
                        @include('admin.sessions.select_formation')
                        </div>
                      
                    </div>
                    
                </div>
            </form>
            <div class="card-footer"></div>
            </div>
           
        </div>
   
</div>
@endsection
