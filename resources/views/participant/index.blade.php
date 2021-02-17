@extends('layouts.app')

@section('content')

<div class="container  text-center  w-60">
    <a class="btn btn-sm btn-success float-right" href="{{ route('participants.create') }}">Ajouter</a>

    <h4 class="m-2 text-muted">Participant</h4>
    <hr>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            

                <div class="card-body">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar" id="my-custom-scrollbar">
                    <table  class="table table-striped table-bordered table-sm" cellspacing="0"
                    width="100%">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">cin</th>
                                <th scope="col">Date de naissance</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th colspan="4">Actions</th>
                                
                              </tr>
                            </thead>
                            <tbody id="myTable">
                                @forelse ($participants as $participant)
                                <tr>
                                   
                                    <td> </td>
                                    <td> {{ $participant->name }} </td>
                                    <td> {{ $participant->cin }} </td>
                                    <td> {{ $participant->birthday }} </td>
                                    <td> {{$participant->email }} </td>
                                    <td> {{$participant->phone }} </td>
                                    <td>
                                <a class="btn  btn-sm btn-outline-warning" href="{{ route('participants.edit', ['participant' => $participant->id]) }}">Éditer</a>

                                    </td>
                                   <td>
                                <a class="btn  btn-sm btn-outline-info" href="{{ route('participants.show', ['participant' => $participant->id]) }}">Afficher </a>

                                   </td>
                                   <td>
                                       <a class="btn btn-sm btn-outline-primary " target="_blank"
                                    href="{{ route('generate-recu-inscription', ['id'=> $participant->id ]) }}">Recu
                                </a></td>
                                <td>
                                  
                                <form style="display: inline"   method="POST"
                                class="fm-inline"
                                action="{{ route('participants.destroy', ['participant' => $participant->id]) }}">
                                @method('DELETE')
                                @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger" >Effacer</button>
                                    </form>
                                </td>
                                  </tr>
                                
                                @empty
                                <span class="badge badge-info">No Participants</span>
                                @endforelse
                             
                            
                            </tbody>
                        </table>
                   
                    </div>
                   

                   
                </div>
           
        </div>
   
</div>
@endsection
