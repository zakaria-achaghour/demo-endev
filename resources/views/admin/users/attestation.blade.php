@extends('layouts.app')

@section('content')

<div class="container  text-center  w-60">
    <h4 class="m-2 text-muted">Demande Attestaion</h4>
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
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Date demande </th>
                                <th scope="col">Status </th>

                                <th >Actions</th>
                                
                              </tr>
                            </thead>
                            <tbody id="myTable">
                                @forelse ($participants as $participant)
                                <tr>
                                   
                                    <td> </td>
                                    <td> {{ $participant->name }} </td>
                                    <td> {{ $participant->cin }} </td>
                                    <td> {{$participant->email }} </td>
                                    <td> {{$participant->phone }} </td>
                                    <td> {{$participant->date_demande_attestion }} </td>
                                    <td> {{$participant->status }} </td>

                                   
                              
                                   <td>
                                    <form style="display: inline"   method="POST"
                                    class="fm-inline"
                                    action="{{ route('admin.generate_attestation') }}">
                                     @csrf
                                    <input type="hidden" value="{{ $participant->session_id }}" name="session">
                                    <input type="hidden" value="{{ $participant->id }}" name="participant">

                                    <button class="btn btn-sm btn-outline-info " target="_blank" type="submit">imprimer</button>
                                    </form>
   
                                     
                                    </td>
                               
                                  </tr>
                                
                                @empty
                                <span class="badge badge-info">No Demande</span>
                                @endforelse
                             
                            
                            </tbody>
                        </table>
                   
                    </div>
                   

                   
                </div>
           
        </div>
   
</div>
@endsection
