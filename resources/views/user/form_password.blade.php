<div class="card my-5">
                    
    <div class="card-body">
<form  method="POST"   action="{{ route('change_password', ['user' => $user->id]) }}">
    @method('PUT')

    @csrf
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Old Password</label>

        <div class="col-md-6">
            <input id="old-password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" required autocomplete="old-password">

            @error('old-password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="new-password" class="col-md-4 col-form-label text-md-right">New Password</label>

        <div class="col-md-6">
            <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required >

            @error('new-password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password-confirm" required >
        </div>
    </div>
     
    <div class="form-group row">
        <div class="col-md-4"></div>
        <div class="col-md-6">



    <button class="btn btn-info" type="submit">Update </button>
</div>
</form>
    </div></div>