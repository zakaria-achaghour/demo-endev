@extends('layouts.app')

@section('content')

<div class="container  text-center mt-2 w-60">
    <a class="btn btn-sm btn-success float-right" href="{{ route('admin.sessions.create') }}">Ajouter</a>
    <h4 class="m-4 text-muted">Sessions</h4>
    <hr>
</div>
<div class="card-body">
 
<table id="table_id" class="table table-striped table-bordered table-sm display" width="100%">
  <thead class="thead-dark">
      <tr>
          <th>Name</th>
          <th>Date de Debut</th>
          <th >Statu</th>
          <th>Nom de Formations</th>
          <th>Nombre de Personne</th>
          <th  >Actions</th>
      </tr>
  </thead>
  <tbody>
     
        @foreach ($sessions as $session)
        <tr>
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

      <td>
        <a class="btn  btn-sm btn-outline-warning" href="{{ route('admin.sessions.edit', ['session' => $session->id]) }}">Éditer</a>
  
        <a class="btn  btn-sm btn-outline-info"  href="{{ route('admin.sessions.show', ['session' => $session->id]) }}">Afficher</a>
      </td>
       </tr>
        @endforeach
    
  </tbody>
  <tfoot>
    <tr>
      <th>Name</th>
      <th>Date de Debut</th>
      <th >Statu</th>
      <th>Nom de Formations</th>
      <th>Nombre de Personne</th>
      <th >Actions</th>
    </tr>
</tfoot>
</table>

</div>

@endsection
