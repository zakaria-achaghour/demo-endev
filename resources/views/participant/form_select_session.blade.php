
    
      
       
      

        <div class="form-group">
          <label for="avance">Avance :</label>
          <input type="text" class="form-control" id="avance" name="avance"
          value="{{ old('avance', $session->pivot->avance ?? null) }}" 
          required="required" autofocus="true">
        </div>

        <div class="form-group">
          <label for="reste">Reste :</label>
          <input type="text" class="form-control" id="reste" 
          value="{{ old('reste', $session->pivot->reste ?? null) }}" 
          
          name="reste">
        </div>

      
        <div class="form-group">
          <label for="session">Session:</label>
          <div>
            <select name="session" id="session" class="form-control"
          value="{{ old('session', $session->id ?? null) }}" 
            required="required">
              @foreach ($sessions as $session)
              <option value="{{ $session->id }}"> {{ $session->name }} </option>
              @endforeach
            </select>
          </div>
        </div>
   
    
 