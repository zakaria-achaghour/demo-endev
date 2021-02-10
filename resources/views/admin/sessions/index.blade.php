@extends('layouts.app')

@section('content')

<div class="container  text-center mt-2 w-60">
    <a class="btn btn-sm btn-success float-right" href="{{ route('admin.sessions.create') }}">Add</a>
    <h4 class="m-4 text-muted">Sessions</h4>
    <hr>
</div>
    <div class="row justify-content-center">
        @forelse ($sessions as $session)
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                    {{$session->name }} - {{ $session->date_start }}
                <div class="card-body">
                   <p><strong>Nombre de Formations :</strong>{{ $session->formations_count}}</p>
                    
                   <p> <strong>Nombre de participants :</strong> </p>
                   
                   @foreach ($session->formations as $formation)
                       <p>{{ $formation->designation }}</p>
                   @endforeach
                </div>
            </div>
        </div>
        @empty
        <span class="badge badge-danger">No Sessions</span>
        @endforelse
       
   
</div>
@endsection
