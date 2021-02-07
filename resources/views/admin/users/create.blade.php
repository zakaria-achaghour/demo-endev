@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add User </div>

                <div class="card-body">
                    <form  method="POST"   action="{{ route('admin.users.store') }}">
                       
                       @include('admin.users.form')
                      
                
                       <button class="btn btn-info" type="submit">Add User</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
