@extends('layouts.app')

@section('content')

<div class="container  text-center  w-60">
    @can('session.manage', User::class)
    <a class="btn btn-sm btn-success float-right" href="{{ route('formations.create') }}"><i class="fas fa-plus"></i></a>
    @endcan
     <h4 class="mt-2 text-muted">Formations</h4>
    
    <hr>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center text-center">
                @forelse ($formations as $formation)
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-2 mb-1" >
                        <div class="card">
                            <div class="card-header text-center">
                                {{ $formation->designation }}
                            </div>
                                
                            <div class="card-body">
                               <h5> {{ $formation->prix }} MAD</h5>
                               <p><span> {{ $formation->vh }} H</span></p>

                                
                               
                            </div>
                            <div class="card-footer" >
                                <a class="btn btn-sm btn-info"  href="{{ route('formations.show',['formation'=>$formation->id]) }}"><i class="fas fa-eye"></i> </a>
                                @can('session.manage', User::class)
                                <a class="btn  btn-sm btn-warning"  href="{{ route('formations.edit', ['formation' => $formation->id]) }}"><i class="fas fa-edit"></i></a>
    
                                <form style="display: inline"   method="POST"
                                class="fm-inline"
                                action="{{ route('formations.destroy', ['formation' => $formation->id]) }}">
                                @method('DELETE')
                                @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i></button>
                                    </form>  
                             @endcan
                            </div>
                        </div>
                    </div>
                @empty
                
                    
                    <span class="badge badge-info mt-5 ">No Formations</span>
                    
                     
                @endforelse
            </div>
            
            
        </div>
   
     
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $formations->links() }}
</div>
@endsection
