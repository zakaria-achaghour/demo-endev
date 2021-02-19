@extends('layouts.app')

@section('content')

<div class="container  text-center mt-2 w-60">
    <a class="btn btn-sm btn-success float-right" href="{{ route('admin.sessions.create') }}">Ajouter</a>
    <h4 class="m-4 text-muted">Sessions</h4>
    <hr>
</div>
<div class="card-body">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar" id="my-custom-scrollbar">
    <table  class="table table-striped table-bordered table-sm" cellspacing="0"
    width="100%">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date de debut</th>
                <th scope="col">Statu</th>
                <th scope="col">Nom de Formations</th>
                <th scope="col">Nombre de Personne</th>
                

                
                <th colspan="4">Actions</th>
                
              </tr>
            </thead>
            <tbody id="myTable">
              
                <tr>
                    @forelse ($sessions as $session)
                    <td> </td>
                    <td> {{ $session->name }} </td>
                    <td> {{ $session->date_start }} </td>
                    <td> {{ $session->status }} </td>
                   
                    <td> 
                        <?php
                        foreach ($session->formations as $formation) {
                        ?>
                        <p>{{ $formation->designation }}</p>
                        <?php  }?>
                    </td>
                    
                    <td>  {{ $session->users_count}} </td>
                    <td> </td>
                    <td>
                <a class="btn  btn-sm btn-outline-warning" href="{{ route('admin.sessions.edit', ['session' => $session->id]) }}">Éditer</a>

                    </td>
                   <td>
                <a class="btn  btn-sm btn-outline-info" href="{{ route('admin.sessions.show', ['session' => $session->id]) }}">Afficher</a>

                   </td>
               
                  </tr>
                
                @empty
                <span class="badge badge-danger">No Sessions</span>
                @endforelse
             
            
            </tbody>
        </table>
   
    </div>
   
@endsection
