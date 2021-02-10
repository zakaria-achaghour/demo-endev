
@csrf
    
<div class="form-group">
  <label for="name">Session Name : </label>
  <input type="text" name="name" id="name"
   class="form-control" placeholder="" aria-describedby="helpId"
   value="{{ old('name', $sessions->name ?? null) }}">
 
</div>
<div class="form-group">
  <label for="date_start">Date debut : </label>
  <input type="Date" name="date_start" id="date_start"
   class="form-control" placeholder="" aria-describedby="helpId"
   value="{{ old('date_start', $sessions->date_start ?? null) }}">
 
</div>



