@extends('layouts.user')

@section('content')

<style>
.container{
max-width:1000px;
margin:auto;
padding:20px;
}

.card{
background:white;
border-radius:12px;
padding:20px;
margin-bottom:20px;
box-shadow:0 4px 10px rgba(0,0,0,0.08);
}

.title{
font-size:20px;
font-weight:600;
margin-bottom:10px;
color:#166534;
}

.grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:15px;
}

.badge{
padding:4px 10px;
border-radius:8px;
font-size:12px;
}

.upcoming{ background:#fef9c3; }
.done{ background:#dcfce7; }
.overdue{ background:#fee2e2; }

.timeline{
border-left:3px solid #22c55e;
padding-left:15px;
}

.timeline-item{
margin-bottom:15px;
}
</style>

<div class="container">

<!-- 🐄 ANIMAL INFO -->
<div class="card">
    <div class="title">🐄 Animal Information</div>

    <div class="grid">
        <div><strong>Type:</strong> {{ $animal->animal_type }}</div>
        <div><strong>Breed:</strong> {{ $animal->breed }}</div>
        <div><strong>Age:</strong> {{ $animal->age }}</div>
        <div><strong>Weight:</strong> {{ $animal->weight }} kg</div>
    </div>
</div>

<!-- 💉 VACCINATION -->
<div class="card">
    <div class="title">💉 Vaccination</div>

    <p><strong>Last:</strong> {{ $animal->last_vaccination }}</p>
    <p><strong>Next:</strong> {{ $animal->next_vaccination }}</p>

    @if($animal->next_vaccination < now())
        <span class="badge overdue">Overdue</span>
    @elseif($animal->next_vaccination <= now()->addDays(3))
        <span class="badge upcoming">Upcoming</span>
    @else
        <span class="badge done">Scheduled</span>
    @endif
</div>

<!-- 💊 DEWORMING -->
<div class="card">
    <div class="title">💊 Deworming</div>

    <p><strong>Last:</strong> {{ $animal->last_deworming }}</p>
    <p><strong>Next:</strong> {{ $animal->next_deworming }}</p>
</div>

<!-- 📝 NOTES -->
<div class="card">
    <div class="title">📝 Notes</div>

    <p>{{ $animal->notes ?? 'No notes available.' }}</p>
</div>

<!-- 🕒 TIMELINE -->
<div class="card">
    <div class="title">🕒 Timeline</div>

    <div class="timeline">
        <div class="timeline-item">
            🐄 Animal registered
        </div>

        <div class="timeline-item">
            💉 Last vaccination: {{ $animal->last_vaccination }}
        </div>

        <div class="timeline-item">
            💊 Last deworming: {{ $animal->last_deworming }}
        </div>
    </div>
</div>

</div>

@endsection