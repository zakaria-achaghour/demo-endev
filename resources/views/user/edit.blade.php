@extends('layouts.app')

@section('content')
<div class="container  text-center mt-2 w-60">
    <h4 class="m-4 text-muted">Edit Your Profile</h4>
    <hr>
</div>
  
           
         <div class="d-flex justify-content-center mt-3">
            <ul class="nav nav-pills flex-column flex-sm-row chnage-bg " role="tablist">

                <li class="nav-item px-md-5">
                    <a href="#step-1" id="step1-tab" class="nav-link active p-2 " aria-selected="true" data-toggle="tab" role="tab">Information</a>
                </li>
                <li class="nav-item px-md-5">
                    <a href="#step-2" id="step2-tab" class="nav-link p-2" aria-selected="false" data-toggle="tab" role="tab">Password</a>
                </li>
            </ul>
         </div>

         <div class="tab-content">
             <div class="tab-pane fade show active" id="step-1" aria-labelledby="step1-tab" role="tabpanel">
                 @include('user.form_profile')
             </div>
             <div class="tab-pane fade show " id="step-2" aria-labelledby="step2-tab" role="tabpanel">
                @include('user.form_password')
            </div>
         </div>
           

                               

               
        
     

@endsection
