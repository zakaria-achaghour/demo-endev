@extends('layouts.app')

@section('content')

<div class="container  text-center mt-1 w-60">
    <h4 class="m-2 text-muted">{{ $formation->designation }}</h4>
    <hr>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Reference : {{ $formation->ref }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Prix : <span class="badge">{{ $formation->prix }}</span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            volume horaire : <span class="badge">{{ $formation->vh }}</span>
                        </div>
                        
                        <div class="card-text mt-5">
                         
                                {{ $formation->description }}
                         
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
   
</div>
@endsection
