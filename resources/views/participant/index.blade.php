@extends('layouts.app')

@section('content')

<div class="container  text-center  w-60">
    <a class="btn btn-sm btn-success float-right" href="{{ route('participants.create') }}">Add</a>

    <h4 class="m-2 text-muted">Participant</h4>
    <hr>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            

                <div class="card-body">
                    <div class=" table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">cin</th>
                                <th scope="col">Date de naissance</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th colspan="3">Actions</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($participants as $participant)
                                <tr>
                                   
                                    <td> </td>
                                    <td> {{ $participant->name }} </td>
                                    <td> {{ $participant->cin }} </td>
                                    <td> {{ $participant->birthday }} </td>
                                    <td> {{$participant->email }} </td>
                                    <td> {{$participant->phone }} </td>
                                    <td>
                                <a class="btn  btn-sm btn-warning" href="{{ route('participants.edit', ['participant' => $participant->id]) }}">Update</a>

                                    </td>
                                   <td>2</td>
                                   <td>
                                       <a class="btn btn-block btn-outline-primary btn-secondary" target="_blank"
                                    href="{{ route('generate-recu-inscription', ['id'=> $participant->id ]) }}">Recu
                                </a></td>
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
