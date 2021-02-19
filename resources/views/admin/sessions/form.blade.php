
@csrf
    
<div class="form-group">
  <label for="name">Session Name : </label>
  <input type="text" name="name" id="name"
   class="form-control" placeholder="" aria-describedby="helpId"
   value="{{ old('name', $session->name ?? null) }}">
 
</div>
<div class="form-group">
  <label for="date_start">Date debut : </label>
  <input type="Date" name="date_start" id="date_start"
   class="form-control" placeholder="" aria-describedby="helpId"
   value="{{ old('date_start', $session->date_start ?? null) }}">
 
</div>

<div class="form-group">
  <label for="status">statu</label>
  <select class="form-control" name="status" id="status">
    <option value="pas en cours">Pas En Cours</option>
    <option value="en cours">En cours</option>
    <option value="fini">Fini</option>
  </select>
</div>


