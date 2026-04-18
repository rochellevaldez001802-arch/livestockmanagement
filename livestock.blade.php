@extends('layouts.admin')

@section('content')

<style>
.table-container{
    max-height: 400px; /* adjust this (400–600px ideal) */
    overflow-y: auto;
    overflow-x: auto;

    background:white;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

table{
width:100%;
border-collapse:collapse;
font-size:14px;
}

thead{
background:#0b5e20;
color:white;
}

th, td{
padding:12px 15px;
text-align:left;
}

tbody tr{
border-bottom:1px solid #eee;
transition:0.2s;
}

tbody tr:hover{
background:#f5fff5;
transform:scale(1.01);
}

/* STATUS BADGES */
.status{
padding:5px 10px;
border-radius:20px;
font-size:12px;
font-weight:600;
}

.status.healthy{
background:#d4edda;
color:#155724;
}

.status.sick{
background:#f8d7da;
color:#721c24;
}

.status.pending{
background:#fff3cd;
color:#856404;
}

/* BUTTONS */
.edit-btn{
border:none;
padding:8px 10px;
border-radius:8px;
cursor:pointer;
background:#4caf50;
color:white;
transition:0.2s;
}

.edit-btn:hover{
transform:scale(1.1);
}
</style>

<div class="table-section">

<div class="table-header">

<div>
<h2>Livestock Records</h2>
<p style="color:#777;font-size:13px;">Manage all registered livestock</p>
</div>

<form method="GET" action="{{ route('livestock') }}">
<div style="display:flex; gap:10px;">
<input 
type="text" 
class="search-box" 
placeholder="Search owner, animal, breed..." 
name="search" 
value="{{ request('search') }}"
>

<button class="filter-btn" type="submit">
<i class="fa-solid fa-filter"></i> Filter
</button>
</div>
</form>

</div>

<div class="table-container">

<table>

<thead>
<tr>
<th>Owner</th>
<th>Animal Type</th>
<th>Breed</th>
<th>Last Vaccination</th>
<th>Next Vaccination</th>
<th>Last Deworming</th>
<th>Next Deworming</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody id="livestockTable">
@include('AdminPages.partials.livestock-table')
</tbody>

</table>

</div>

</div>
<script>
const searchInput = document.querySelector('.search-box');

searchInput.addEventListener('keyup', function () {
    let query = this.value;

    fetch(`{{ route('livestock') }}?search=${query}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('livestockTable').innerHTML = data;
    });
});
</script>
@endsection