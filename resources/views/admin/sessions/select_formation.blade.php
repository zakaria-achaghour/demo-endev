<div class="card-body">
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <div class="row justify-content-center">
            @forelse ($formations as $formation)
          <div class="col-md-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input " type="checkbox" value="{{ $formation->id }}" name="formations[]" 
                   >
                   
                  
                    {{ $formation->designation }}
                </label>
            </div>

          </div>
              
              @empty
              <span class="badge badge-info">No Formations</span>
              @endforelse
        </div>
    </div>
</div>

<!--
 if($session->formations->pluck('id')->contains($formation->id)) checked  endif
-->