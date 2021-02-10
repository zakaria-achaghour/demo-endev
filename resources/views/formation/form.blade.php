@csrf
    
<div class="form-group">
  <label for="designation">Designation : </label>
  <input type="text" name="designation" id="designation"
   class="form-control" placeholder="" aria-describedby="helpId"
   value="{{ old('designation', $formation->designation ?? null) }}" required>
 
</div>
<div class="form-group">
    <label for="prix">Prix : </label>
    <input type="text" name="prix" id="prix"
     class="form-control"  aria-describedby="helpId"
    value="{{ old('prix', $formation->prix ?? null) }}" required>
   
  </div>
  <div class="form-group">
    <label for="vh">volume horaire :</label>
    <input type="text" name="vh" id="vh" 
    class="form-control" aria-describedby="helpId"
    value="{{ old('vh', $formation->vh ?? null) }}" required>
   
  </div>

  <div class="form-group">
    <label for="description">Description :</label>
      <textarea class="form-control" name="description" 
                id="description" cols="90" rows="10" 
                 required>{{ old('description', $formation->description ?? null) }}</textarea>
  
  </div>
