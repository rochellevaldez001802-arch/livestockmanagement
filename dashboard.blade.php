@extends('layouts.user')

@section('content')

<style>
/* TITLE */
.dashboard-title{
text-align:center;
font-weight:bold;
letter-spacing:2px;
margin-bottom:25px;
color:#0b3d1c;
text-shadow:1px 1px 2px rgba(0,0,0,0.1);
}

/* ALERT BOX */
.alert-box{
max-width:950px;
margin:20px auto;
display:flex;
gap:15px;
flex-wrap:wrap;
}

/* ALERT CARD */
.alert{
flex:1;
padding:12px 18px;
border-radius:8px;
font-weight:bold;
display:flex;
align-items:center;
gap:10px;
min-width:280px;
box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

/* VACCINE ALERT */
.alert-vaccine{
background:#fee2e2;
color:#b91c1c;
border-left:5px solid #ef4444;
}

/* DEWORM ALERT */
.alert-deworm{
background:#fef3c7;
color:#92400e;
border-left:5px solid #f59e0b;
}

/* CARD */
.dashboard-card{
max-width:950px;
margin:auto;
background:rgba(255,255,255,0.95);
padding:25px;
border-radius:12px;
box-shadow:0 8px 25px rgba(0,0,0,0.15);
backdrop-filter:blur(10px);
}

/* HEADER */
.dashboard-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
padding-bottom:15px;
border-bottom:2px solid rgba(11,93,32,0.1);
}

/* USER NAME */
.user-name{
font-weight:bold;
font-size:18px;
color:#0b5e20;
background:linear-gradient(45deg, #0b5e20, #0b3d1c);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
background-clip:text;
}

/* SEARCH BAR */
.search-box{
display:flex;
gap:5px;
}

.search-box input{
padding:10px 16px;
border:2px solid #e0e0e0;
border-radius:25px;
outline:none;
transition:0.3s;
font-size:14px;
}

.search-box input:focus{
border-color:#0b5e20;
box-shadow:0 0 0 3px rgba(11,93,32,0.1);
}

.search-box button{
padding:10px 20px;
border:none;
background:#0b5e20;
color:white;
border-radius:25px;
cursor:pointer;
font-weight:600;
transition:0.3s;
}

.search-box button:hover{
background:#084917;
transform:translateY(-1px);
}

/* TABLE */
.table-container{
max-height:420px;
overflow:auto;
border-radius:8px;
box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

table{
width:100%;
border-collapse:collapse;
font-size:14px;
min-width:900px;
background:white;
}
thead th{
position:sticky;
top:0;
background:#f8fafc;
z-index:2;
}
th, td{
border:1px solid #e5e7eb;
padding:12px 10px;
text-align:center;
}

th{
background:linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
font-weight:600;
color:#374151;
}

/* VACCINATION STATUS */
.vaccine-urgent{
background:#fee2e2;
color:#dc2626;
font-weight:bold;
padding:6px 12px;
border-radius:20px;
font-size:13px;
}

.vaccine-warning{
background:#fef3c7;
color:#d97706;
font-weight:bold;
padding:6px 12px;
border-radius:20px;
font-size:13px;
}

.vaccine-safe{
background:#dcfce7;
color:#16a34a;
font-weight:bold;
padding:6px 12px;
border-radius:20px;
font-size:13px;
}

/* STATUS */
.alive{color:#16a34a;font-weight:bold;}
.sold{color:#ea580c;font-weight:bold;}
.dead{color:#dc2626;font-weight:bold;}

/* ACTION BUTTONS */
.actions{
display:flex;
justify-content:center;
gap:8px;
}

.btn-edit{
background:#0b5e20;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
text-decoration:none;
font-size:13px;
font-weight:500;
transition:0.3s;
}

.btn-edit:hover{
background:#084917;
transform:translateY(-1px);
box-shadow:0 4px 12px rgba(11,93,32,0.3);
}

.btn-delete{
background:#dc2626;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
font-size:13px;
transition:0.3s;
}

.btn-delete:hover{
background:#b91c1c;
transform:translateY(-1px);
}

/* ADD BUTTON */
.add-container{
max-width:950px;
margin:30px auto;
display:flex;
justify-content:flex-end;
}

.add-btn{
padding:12px 30px;
background:linear-gradient(45deg, #0b5e20, #0b3d1c);
color:white;
border:none;
border-radius:25px;
font-weight:bold;
cursor:pointer;
font-size:16px;
transition:0.3s;
box-shadow:0 4px 15px rgba(11,93,32,0.3);
}

.add-btn:hover{
transform:translateY(-2px);
box-shadow:0 8px 25px rgba(11,93,32,0.4);
.notification-box{
max-width:950px;
margin:20px auto;
}

.notif{
background:#f9fafb;
padding:12px 15px;
border-radius:10px;
margin-bottom:10px;
box-shadow:0 2px 6px rgba(0,0,0,0.1);
}

.notif strong{
color:#0b5e20;
}

.notif p{
font-size:13px;
margin:3px 0;
}

.notif small{
color:#777;
font-size:11px;
}

/* UNREAD highlight */
.unread{
border-left:5px solid #22c55e;
background:#ecfdf5;
}
}
</style>

<!-- CONTENT STARTS HERE -->
<h2 class="dashboard-title">
WELCOME! <br>
<span style="font-size:1.2em;">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} Dashboard</span>
</h2>

<div class="alert-box">

@if($vaccineReminder > 0)
<div class="alert alert-vaccine">
⚠ {{ $vaccineReminder }} Animal(s) Need Vaccination Within 3 Days
</div>
@endif

@if($dewormReminder > 0)
<div class="alert alert-deworm">
🐛 {{ $dewormReminder }} Animal(s) Need Deworming Within 3 Days
</div>
@endif

</div>
<div class="dashboard-card">
<div class="dashboard-header">
<div class="user-name">
👋 Welcome Back!
</div>

<form method="GET" action="{{ route('user.dashboard') }}" class="search-box">
<input type="text" name="search" placeholder="🔍 Search animal..." value="{{ request('search') }}">
<button type="submit">Search</button>
</form>
</div>

<div class="table-container">
<table>
<thead>
<tr>
<th>Animal Type</th>
<th>Breed</th>
<th>Last Vaccination</th>
<th>Next Vaccination</th>
<th>Last Deworming</th>
<th>Next Deworming</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@forelse($animals as $animal)
<tr>
<td>{{ $animal->animal_type }}</td>
<td>{{ $animal->breed }}</td>
<td>{{ $animal->last_vaccination ?? 'N/A' }}</td>
<td>
@php
$next = \Carbon\Carbon::parse($animal->next_vaccination);
$today = \Carbon\Carbon::today();
$diff = $today->diffInDays($next, false);
@endphp
@if($diff <= 0)
<span class="vaccine-urgent">⚠ {{ $animal->next_vaccination }}</span>
@elseif($diff <= 3)
<span class="vaccine-warning">! {{ $animal->next_vaccination }}</span>
@else
<span class="vaccine-safe">✓ {{ $animal->next_vaccination }}</span>
@endif
</td>
<td>{{ $animal->last_deworming ?? 'N/A' }}</td>
<td>
@php
$next = \Carbon\Carbon::parse($animal->next_deworming);
$today = \Carbon\Carbon::today();
$diff = $today->diffInDays($next, false);
@endphp
@if($diff <= 0)
<span class="vaccine-urgent">⚠ {{ $animal->next_deworming }}</span>
@elseif($diff <= 3)
<span class="vaccine-warning">! {{ $animal->next_deworming }}</span>
@else
<span class="vaccine-safe">✓ {{ $animal->next_deworming }}</span>
@endif
</td>
<td class="{{ strtolower($animal->status) }}">{{ $animal->status }}</td>
<td class="actions">
<a href="{{ route('user.animals.edit', $animal->id) }}" class="btn-edit">Edit</a>
<a href="{{ route('animals.show', $animal->id) }}" class="btn-edit">Show</a>
<form action="{{ route('user.animals.delete', $animal->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="btn-delete" onclick="return confirm('Delete {{ $animal->animal_type }}?')">Delete</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="8" style="padding:40px; text-align:center; color:#666;">
No animals found. <a href="{{ route('user.animals.create') }}">Add your first animal!</a>
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>

<div class="add-container">
<a href="{{ route('user.animals.create') }}">
<button class="add-btn">+ Add New Animal</button>
</a>
</div>

@endsection