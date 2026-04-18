@extends('layouts.admin')

@section('content')

<div class="form-card">

<div class="form-header">
<h2>Edit Livestock</h2>
<p>Update the livestock record information</p>
</div>

<form action="{{ route('livestock.update',$animal->id) }}" method="POST">

@csrf
@method('PUT')

<div class="form-grid">

<div class="form-group">
<label>Animal Type</label>
<input type="text" name="animal_type" value="{{ $animal->animal_type }}">
</div>

<div class="form-group">
<label>Breed</label>
<input type="text" name="breed" value="{{ $animal->breed }}">
</div>

<div class="form-group">
<label>Status</label>
<select name="status">
<option {{ $animal->status=='Alive'?'selected':'' }}>Alive</option>
<option {{ $animal->status=='Sold'?'selected':'' }}>Sold</option>
<option {{ $animal->status=='Dead'?'selected':'' }}>Dead</option>
</select>
</div>

<div class="form-group">
<label>Last Vaccination</label>
<input type="date" name="last_vaccination" value="{{ $animal->last_vaccination }}">
</div>

<div class="form-group">
<label>Next Vaccination</label>
<input type="date" name="next_vaccination" value="{{ $animal->next_vaccination }}">
</div>

<div class="form-group">
<label>Last Deworming</label>
<input type="date" name="last_deworming" value="{{ $animal->last_deworming }}">
</div>

<div class="form-group">
<label>Next Deworming</label>
<input type="date" name="next_deworming" value="{{ $animal->next_deworming }}">
</div>

</div>

<div class="form-actions">
<button type="submit" class="update-btn">Update Livestock</button>
</div>

</form>

</div>

@endsection