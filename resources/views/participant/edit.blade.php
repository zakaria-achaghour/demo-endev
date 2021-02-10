@extends('layouts.app')

@section('content')

<div class="container  text-center  w-60">
    <h4 class=" text-muted">Update Participant</h4>
    <hr>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            

                <form  method="POST" action="{{ route('participants.update', ['participant' => $participant->id]) }}"  >
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            @include('participant.form')

                        </div>
                       
                   
                        <div class="card-body">

                            @include('participant.form_select_session')

                        </div>
                       
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-warning btn-sm mt-1" style="width: 100%">Update</button>
                            </div>
                            <div class="col-md-6 col-sm-12 mt-1">
                                <a href="{{ route('participants.index') }}" class="btn btn-danger btn-sm" style="width: 100%">Annulier</a>
                            </div>
                           
                        </div>
                 
            </form>
            </div>
            <div class="card-header"></div>
        
        </div>
   
</div>
@endsection
