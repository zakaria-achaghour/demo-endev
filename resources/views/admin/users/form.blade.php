@csrf
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">


<label for="roles" class="col-md-4 col-form-label text-md-right">Roles</label>
<div class="col-md-6">
@foreach ($roles as $role)
   <div class="form-check ">
     <label class="form-check-label">
       <input type="checkbox" class="form-check-input" name="roles[]" id="roles[]" value="{{ $role->id }}"
       @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
       {{$role->name}}
     </label>
   </div>

@endforeach
</div>
</div>
<div class="form-group row">
    <div class="col-md-4"></div>
    <div class="col-md-6">
