@extends('layouts.app')

@section('content')

<div class="container  text-center mt-1 w-60">
    <h4 class="m-2 text-muted">Update Sessions</h4>
    <hr>
</div>
    <div class="row justify-content-center">
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
                <form  method="POST" action="{{ route('admin.sessions.update',['session'=>$session->id]) }}" >
                    @csrf
                    @method('PUT')
                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                        <div class="card-body">

                            @include('admin.sessions.form')

                        </div>
                        <div class="card-footer">
                       
                        </div>
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                        @include('admin.sessions.select_formation')
                       
                        <div class="card-footer">
                       
                        </div>
                    </div>
                    
                </div>
            </form>
            </div>
            <div class="card-header"></div>
        </div>
   
</div>
@endsection
