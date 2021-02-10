<div class="card-body">
                            
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <div class="row justify-content-center">
            @forelse ($participants as $participant)
          <div class="col-md-4">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input selectBox" type="checkbox" value="{{ $participant->id }}" name="id_participants[]" >
                    {{ $participant->name }}
                </label>
            </div>

          </div>
              
              @empty
              <span class="badge badge-info">No Participants</span>
              @endforelse
        </div>
       
    </div>
   
</div>