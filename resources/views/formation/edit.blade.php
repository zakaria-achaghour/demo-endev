 @extends('layouts.app')

@section('content')

<div class="container  text-center mt-1 w-60">
    <h4 class="m-2 text-muted">Update Formation</h4>
    <hr>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form  method="POST"   action="{{ route('formations.update', ['formation' => $formation->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                      
                   
                    @include('formation.form')
                    <button class="btn btn-success " type="submit">Update </button>
                    <a class="btn btn-warning" href="{{ route('formations.index') }}">Back</a>
            </form>
                </div>
            </div>
        </div>
   
</div>
@endsection
