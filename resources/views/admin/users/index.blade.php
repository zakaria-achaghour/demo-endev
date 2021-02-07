@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users <a class="btn btn-success btn-sm float-right" href="{{ route('admin.users.create') }}">add user</a></div>

                <div class="card-body">
               
                    
                

                 <table class="table">
                     <thead>
                         <tr>
                             <th></th>
                             <th>Name</th>
                             <th>Eamil</th>
                             @can('user.manage', User::class)
                             <th>Role</th>
                             @endcan
                             <th>Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                         <tr>
                             <td >{{ $user->id }} </td>
                             <td >{{ $user->name }} </td>
                             <td >{{ $user->email }} </td>
                           <!-- <td>
                                foreach ($user->roles as $role)
                                     { $role->name }}
                                endforeach
                            </td>-->
                            <td>
                                {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                            </td>
                            @can('user.manage', User::class)
                             <td > 
                                 <a class="btn btn-sm btn-info" href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Edit</a>
                                
                                 
                                 <form style="display: inline"   method="POST"
                                 class="fm-inline"
                                 action="{{ route('admin.users.destroy', ['user' => $user->id]) }}">
                                  @csrf
                                 @method('DELETE')
                         
                          <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                         </form>


                             </td>
                            @endcan
                            
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
