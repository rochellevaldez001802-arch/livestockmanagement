<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Panel</title>

@vite(['resources/css/app.css','resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, Helvetica, sans-serif;
}

body{
display:flex;
background:#eef1f5;
overflow-x:hidden;
}

.dashboard-layout{
display:grid;
grid-template-columns: 2fr 1fr;
gap:20px;
align-items:start;
 align-items: stretch;
}

.dashboard-main{
display:flex;
flex-direction:column;
gap:20px;
}

/* WELCOME CARD */

.welcome-card{
background:#d4a656;
color:white;
padding:20px;
border-radius:12px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

/* SIDEBAR */

.sidebar{
width:200px;
height:100vh;
background:#1b5e20;
color:white;
position:fixed;
left:0;
top:0;
transition:0.3s;
z-index:1000;
}

.sidebar-header{
text-align:center;
padding:20px;
font-size:18px;
font-weight:bold;
border-bottom:1px solid rgba(255,255,255,0.2);
}

.sidebar a{
display:block;
padding:12px 18px;
color:white;
text-decoration:none;
font-size:14px;
border-left:3px solid transparent;
transition:0.2s;
}

.sidebar a:hover{
background:#2e7d32;
border-left:3px solid #a5d6a7;
}
.sidebar a i{
margin-right:10px;
width:18px;
text-align:center;
}
/* MAIN AREA */

.main{
margin-left:200px;
width:calc(100% - 200px);
min-height:100vh;
display:flex;
flex-direction:column;
}

/* TOPBAR */

.topbar{
position:fixed;
top:0;
left:200px;
width:calc(100% - 200px);
height:70px;

display:flex;
justify-content:space-between;
align-items:center;

padding:12px 25px;
background:white;

box-shadow:0 5px 10px rgba(0,0,0,0.15);

z-index:999;
}

/* LEFT SIDE */

.logo-area{
display:flex;
align-items:center;
gap:12px;
}

.logo-area img{
height:45px;
}

.system-title{
display:flex;
flex-direction:column;
font-weight:bold;
font-size:18px;
line-height:1.1;
}

/* RIGHT SIDE */

.profile-area{
display:flex;
align-items:center;
gap:15px;
}

.admin-name{
font-weight:500;
}

.logout-btn{
background:#d32f2f;
color:white;
border:none;
padding:8px 16px;
border-radius:6px;
cursor:pointer;
}

.logout-btn:hover{
background:#b71c1c;
}

/* CONTENT */

.container{
padding:15px;
margin-top:75px;
width:100%;

}

/* STAT CARDS */

.stats-section{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
}

.stat-icon{
font-size:22px;
margin-bottom:8px;
color:#1b5e20;
}

.card-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;
margin-bottom:30px;
}

.stat-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:15px;
}

.stat-card{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 4px 10px rgba(0,0,0,0.08);
text-align:center;
height:110px;

display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
}
.stat-card h3{
font-size:22px;
color:#1b5e20;
}

.stat-card p{
font-size:13px;
color:#666;
}


.card:nth-child(1){
border-top:4px solid #2e7d32;
}

.card:nth-child(2){
border-top:4px solid #1976d2;
}

.card:nth-child(3){
border-top:4px solid #f9a825;
}

.card:nth-child(4){
border-top:4px solid #6a1b9a;
}

/* TABLE SECTION */
.table-section{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 6px 15px rgba(0,0,0,0.08);
}

.table-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:15px;
}

.search-box{
padding:8px 12px;
border-radius:6px;
border:1px solid #ddd;
outline:none;
}

.search-box:focus{
border-color:#1b5e20;
}

.filter-btn{
background:#1b5e20;
color:white;
border:none;
padding:8px 14px;
border-radius:6px;
cursor:pointer;
}

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
}

thead{
background:#f7f9fc;
}

th{
font-weight:600;
font-size:14px;
color:#444;
padding:12px;
}

td{
padding:12px;
font-size:14px;
border-top:1px solid #eee;
}
thead th{
position:sticky;
top:0;
background:#f5f5f5;
z-index:1;
}

tbody tr{
transition:0.15s;
}

tbody tr:hover{
background:#f9fbfd;
}
/* STATUS BADGES */

.status{
padding:5px 12px;
border-radius:20px;
font-size:12px;
font-weight:600;
}

.alive{
background:#e8f5e9;
color:#2e7d32;
}

.sold{
background:#e3f2fd;
color:#1565c0;
}

.dead{
background:#ffebee;
color:#c62828;
}

/* EDIT BUTTON */

.edit-btn{
background:#1b5e20;
color:white;
border:none;
padding:6px 14px;
border-radius:6px;
cursor:pointer;
font-size:13px;
transition:0.2s;
}

.edit-btn:hover{
background:#2e7d32;
}
/* CHART CARD */

.chart-card {
    flex: 1; /* stretch to match right panel */
    display: flex;
    flex-direction: column;
    gap: 20px;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

#livestockChart {
    width: 100% !important;
    max-height: 250px; /* reasonable height */
}

.chart-layout{
display:flex;
align-items:center;
justify-content:space-between;
gap:25px;
}

.chart-layout canvas{
width:220px !important;
height:220px !important;
}

.chart-stats {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.chart-row {
    display: flex;
    align-items: center;
    gap: 10px;
}

.bar {
    flex: 1; /* fills remaining space */
    height: 15px;
    background: #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
}

.bar-fill {
    height: 100%;
    border-radius: 8px;
}


.bar-fill.green { background: #22c55e; }
.bar-fill.blue { background: #3b82f6; }
.bar-fill.yellow { background: #facc15; }
.bar-fill.red { background: #ef4444; }


/* FARMERS PANEL */

.left-panel{
display:flex;
flex-direction:column;
gap:20px;
}

.right-panel{
display:flex;
flex-direction:column;
gap:20px;
max-height: 100%;
}
.left-panel, .right-panel {
    display: flex;
    flex-direction: column;
    gap: 25px;
    height: 100%; /* ensures stretch */
}
/* INNER CALENDAR BOX */
#calendar {
    background: #ffffff;
    padding: 15px;
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    max-width: 700px;
    margin: 0 auto; /* 🔥 CENTER */
}


/* HEADER (MONTH) */
.fc-toolbar {
    justify-content: space-between !important;
}

.fc-toolbar-title {
    font-size: 17px !important;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
}
/* REMOVE TODAY TEXT */
.fc-toolbar-chunk:nth-child(2) {
    display: none;
}

/* HIDE EXTRA BUTTONS */
.fc-button {
    background: transparent !important;
    border: none !important;
    color: #9ca3af !important;
    box-shadow: none !important;
}

/* DAYS HEADER (SUN MON TUE) */
.fc-col-header-cell {
    border: none !important;
    font-size: 11px;
    color: #9ca3af;
    text-transform: uppercase;
}

/* REMOVE GRID LINES */
.fc-theme-standard td,
.fc-theme-standard th {
    border: none !important;
}

/* DAY CELL */
.fc-daygrid-day {
    text-align: center;
}

/* FIX DATE CONTAINER */
.fc-daygrid-day-frame {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* FIX DATE POSITION */
.fc-daygrid-day-top {
    justify-content: center !important;
}

/* PERFECT CIRCLE */
.fc-daygrid-day-number {
    display: flex !important;
    align-items: center;
    justify-content: center;
}

/* DATE NUMBER */
.fc-daygrid-day-number {
    margin: auto;
    font-size: 13px;
    color: #374151;
    width: 32px;
    height: 32px;
    line-height: 32px;
    border-radius: 50%;
    transition: 0.3s;
}

/* HOVER EFFECT */
.fc-daygrid-day-number:hover {
    background: #e5e7eb;
}
/* REMOVE BACKGROUND STRIP */
.fc-daygrid-day-bg {
    display: none !important;
}

/* TODAY (circle highlight) */
.fc-day-today .fc-daygrid-day-number {
    background: #1f2937;
    color: white;
    font-weight: bold;
}

/* EVENT DOT STYLE */
.fc-event {
    background: transparent !important;
    border: none !important;
}

.fc-daygrid-event-dot {
    border-color: #3b82f6 !important;
}

/* EVENT TEXT HIDDEN (just dot style) */
.fc-event-title {
    display: none;
}

/* REMOVE SCROLL */
.fc-scroller {
    overflow: hidden !important;
}

/* FORCE FULL WIDTH + CENTER */
.fc {
    width: 100% !important;
    margin: 0 auto !important;
}

/* ENSURE INNER TABLE TAKES FULL WIDTH */
.fc-scrollgrid {
    width: 100% !important;
}

/* CENTER EVERYTHING INSIDE */
.fc-view-harness {
    display: flex;
    justify-content: center;
}

/* FIX CALENDAR SIZE */
#calendar {
    height: auto !important;
    max-height: none !important;
}

.farmers-panel {
    background: #fff;
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.farmers-panel h3 {
    margin-bottom: 10px;
}

/* Scrollable list */
.farmers-list {
    max-height: 400px; /* adjust to match chart or desired height */
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding-right: 5px; /* for scrollbar spacing */
}

/* Optional: Scrollbar styling */
.farmers-list::-webkit-scrollbar {
    width: 6px;
}

.farmers-list::-webkit-scrollbar-thumb {
    background: #22c55e;
    border-radius: 3px;
}

.farmers-list::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* EACH FARMER */
.farmer {
    display: flex;
    gap: 10px;
    padding: 8px;
    border-radius: 10px;
    background: #f6fff6;
    text-decoration: none;
    color: #000;
    align-items: center;
}

.farmer img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.farmer div strong {
    display: block;
    font-size: 15px;
    color: #111;
}

.farmer div p {
    margin: 0;
    font-size: 13px;
    color: #555;
}

.farmer:hover {
    background: rgba(74, 222, 128, 0.1);
}

#calendar{
max-width:100%;
background:white;
border-radius:10px;
padding:10px;
}

.fc-toolbar-title{
font-size:16px;
font-weight:bold;
}

.stat-card,
.chart-card,
.calendar-card,
.farmers-panel{
transition:0.2s ease;
}

.stat-card:hover,
.chart-card:hover,
.calendar-card:hover,
.farmers-panel:hover{
transform:translateY(-3px);
box-shadow:0 8px 18px rgba(0,0,0,0.1);
}
/* PAGE GRID */

.farmer-page{
display:grid;
grid-template-columns:250px 1fr;
gap:20px;
padding:10px;
align-items:start;
}
/* PROFILE CARD */

.farmer-card{
background:#fff;
border-radius:15px;
padding:25px;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
display:flex;
flex-direction:column;
align-items:center;
}

/* COVER */

.farmer-cover{
height:120px;
background:#f2f2f2;
border-radius:10px;
margin-bottom:60px;
}

/* AVATAR */

.farmer-avatar{
display:flex;
justify-content:center;
align-items:center;
margin-top:-170px; 
width:100%;
}

.farmer-avatar img{
width:120px;
height:120px;
border-radius:50%;
border:4px solid white;
object-fit:cover;
}

/* USERNAME */

.username{
margin-top:10px;
font-weight:600;
color:#444;
}

/* PROFILE INFO */

.farmer-info{
margin-top:20px;
text-align:left;
}

.farmer-info p{
margin:12px 0;
padding-bottom:6px;
border-bottom:1px solid #ddd;
}

/* ANIMAL CARD */

.animal-card{
background:#fff;
border-radius:15px;
padding:20px;
box-shadow:0 6px 18px rgba(0,0,0,0.08);
display:flex;
flex-direction:column;
height:100%;
}

/* HEADER */

.animal-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

/* TABLE */

.animal-table{
max-height:400px;
overflow-y:auto;
overflow-x:auto;
border-radius:10px;
}

.animal-table table{
width:100%;
border-collapse:collapse;
}

.animal-table th{
text-align:left;
padding:12px;
background:#f5f5f5;
font-weight:600;
}

.animal-table td{
padding:12px;
border-bottom:1px solid #eee;
}

/* STATUS BADGES */

.status{
padding:6px 12px;
border-radius:20px;
font-size:13px;
font-weight:600;
}

.status.alive{
background:#e6f4ea;
color:#2e7d32;
}

.status.dead{
background:#fdecea;
color:#c62828;
}

.status.sold{
background:#fff4e5;
color:#ef6c00;
}

/* FORM CARD */

.form-card{
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 6px 15px rgba(0,0,0,0.08);
max-width:900px;
}

/* HEADER */

.form-header{
margin-bottom:25px;
}

.form-header h2{
font-size:22px;
margin-bottom:5px;
}

.form-header p{
font-size:13px;
color:#777;
}

/* GRID */

.form-grid{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:20px;
}

/* GROUP */

.form-group{
display:flex;
flex-direction:column;
}

.form-group label{
font-size:13px;
font-weight:600;
margin-bottom:6px;
color:#444;
}

/* INPUT */

.form-group input,
.form-group select{
padding:10px;
border-radius:8px;
border:1px solid #ddd;
outline:none;
transition:0.2s;
}

.form-group input:focus,
.form-group select:focus{
border-color:#1b5e20;
box-shadow:0 0 0 2px rgba(27,94,32,0.1);
}

/* BUTTON */

.form-actions{
margin-top:25px;
}

.update-btn{
background:#1b5e20;
color:white;
padding:10px 20px;
border:none;
border-radius:8px;
cursor:pointer;
font-weight:600;
}

.update-btn:hover{
background:#2e7d32;
}

.admin-avatar {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    transition: 0.3s ease;
}

.admin-avatar:hover {
    transform: scale(1.1);
}

.vaccine-popup {
    display: none;
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
}

.popup-content {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    max-height: 400px;
    overflow-y: auto;
}

.popup-content h4 {
    margin-bottom: 10px;
}

.popup-content ul {
    list-style: none;
    padding: 0;
}

.popup-content ul li {
    padding: 5px 0;
    border-bottom: 1px solid #eee;
}

.popup-content button {
    margin-top: 10px;
    padding: 6px 12px;
    border: none;
    background: #22c55e;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
/* OVERLAY */
.event-modal{
    display:none;
    position:fixed;
    z-index:9999;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    backdrop-filter:blur(5px);
}

/* MODAL BOX */
.modal-content{
    margin:5% auto;
    width:90%;
    max-width:420px;
    padding:20px;
    border-radius:20px;
    color:#fff;
    max-height:70vh;
    overflow-y:auto;
}


/* HEADER */
.modal-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

.modal-header h3{
    margin:0;
    font-size:18px;
}

/* CLOSE BUTTON */
.close-btn{
    font-size:22px;
    cursor:pointer;
    transition:0.2s;
}
.close-btn:hover{
    transform:scale(1.2);
}

/* EVENT LIST */
.event-list{
    display:flex;
    flex-direction:column;
    gap:10px;
}

/* EVENT CARD */
.event-item{
    padding:12px;
    border-radius:12px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:14px;
    transition:0.2s;
}

/* HOVER */
.event-item:hover{
    transform:scale(1.02);
}

/* COLORS */
.vaccine{
    background:rgba(59,130,246,0.8); /* blue */
}

.deworm{
    background:rgba(245,158,11,0.8); /* yellow */
}

.both{
    background:rgba(124,58,237,0.8); /* purple */
}

/* TYPE LABEL */
.event-type{
    font-size:12px;
    opacity:0.9;
}

.done-btn{
    background:#22c55e;
    border:none;
    padding:6px 10px;
    border-radius:8px;
    color:#fff;
    font-size:12px;
    cursor:pointer;
    transition:0.2s;
}

.done-btn:hover{
    background:#16a34a;
}
</style>

</head>

<body>


<!-- SIDEBAR -->

<div class="sidebar">

<div class="sidebar-header">
Livestock Admin
</div>

<a href="{{ route('dashboard') }}">
<i class="fa-solid fa-chart-line"></i> Dashboard
</a>

<a href="{{ route('livestock') }}">
<i class="fa-solid fa-cow"></i> Livestock Records
</a>

<a href="#">
<i class="fa-solid fa-syringe"></i> Vaccination
</a>

<a href="{{ route('admin.farmers') }}">
<i class="fa-solid fa-users"></i> Owners
</a>

<a href="#">
<i class="fa-solid fa-file"></i> Reports
</a>

<a href="{{ route('admin.settings') }}">
<i class="fa-solid fa-gear"></i> Settings
</a>

</div>

<!-- MAIN -->

<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <!-- LEFT SIDE -->
        <div class="logo-area">

            <img src="{{ asset('images/aparri.png') }}" alt="Logo">

            <div class="system-title">
                <span>APARRI</span>
                <span>LIVESTOCK MANAGEMENT</span>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="profile-area">

            <span class="admin-name">{{ auth()->user()->first_name }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>

        </div>

    </div>

    <!-- PAGE CONTENT -->
    <div class="container">
        @yield('content')
    </div>

</div>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const ctx = document.getElementById('livestockChart');

if(ctx){

new Chart(ctx,{
type:'doughnut',

data:{
labels:['Cattle','Pig','Goat','Chicken'],
datasets:[{
data: {!! json_encode($chartData ?? [20,15,7,8]) !!},
backgroundColor:[
'#4CAF50',
'#3F51B5',
'#FFC107',
'#F44336'
]
}]
},

options:{
cutout:'65%',
plugins:{
legend:{display:false}
}
}

});
}
document.addEventListener('DOMContentLoaded', function () {

    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    const events = @json($events ?? []); // your events from PHP

    // Convert events into a map by date
    const eventMap = {};
    events.forEach(e => {
        if (!eventMap[e.start]) eventMap[e.start] = [];
        eventMap[e.start].push(e);
    });

    // Modal elements
    const modal = document.getElementById('eventModal');
    const modalDate = document.getElementById('modalDate');
    const modalList = document.getElementById('modalEventList');
    const closeBtn = document.querySelector('.close-btn');

    // Close modal functions
    closeBtn.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', e => { if(e.target == modal) modal.style.display = 'none'; });

    // Initialize FullCalendar
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 'auto',
        fixedWeekCount: false,

        dayCellDidMount: function(info) {

    let date = info.date.toISOString().split('T')[0];
    let el = info.el.querySelector('.fc-daygrid-day-number');

    if(eventMap[date]){

        let types = eventMap[date].map(e => e.type);

        // 🔵 Vaccine only
        if(types.includes('vaccine') && !types.includes('deworm')){
            el.style.background = '#3b82f6';
        }

        // 🟡 Deworm only
        else if(types.includes('deworm') && !types.includes('vaccine')){
            el.style.background = '#f59e0b';
        }

        // 🟣 BOTH
        else if(types.includes('vaccine') && types.includes('deworm')){
            el.style.background = '#7c3aed';
        }

        // ✅ Circle style (like before)
        el.style.color = '#fff';
        el.style.borderRadius = '50%';
        el.style.width = '32px';
        el.style.height = '32px';
        el.style.display = 'flex';
        el.style.alignItems = 'center';
        el.style.justifyContent = 'center';
    }
},

        dateClick: function(info){
    const dateStr = info.dateStr;
    const eventsToday = eventMap[dateStr] || [];

    if(eventsToday.length){

        modalDate.innerText = "📅 " + dateStr;
        modalList.innerHTML = "";

       eventsToday.forEach(e => {

    let typeClass = '';
    let label = '';

    if(e.type === 'vaccine'){
        typeClass = 'vaccine';
        label = '💉 Vaccination';
    } else {
        typeClass = 'deworm';
        label = '🐛 Deworming';
    }

    const div = document.createElement('div');
    div.className = 'event-item ' + typeClass;

    div.innerHTML = `
        <div>
            <strong>${e.animal}</strong>
            <div class="event-type">${label}</div>
            <small>Owner: ${e.owner}</small>
        </div>

        <button class="done-btn" data-id="${e.id}" data-type="${e.type}">
        ✔ Done
        </button>
    `;

    modalList.appendChild(div);
});

        modal.style.display = "block";
    }
}
    });

    calendar.render();
});
document.addEventListener('click', function(e){

    if(e.target.classList.contains('done-btn')){

        let btn = e.target;
        let id = btn.dataset.id;
        let type = btn.dataset.type;

        fetch(`/animal/mark-done/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ type: type })
        })
        .then(res => res.json())
        .then(data => {

            if(data.success){

                // 🔥 REMOVE the event card smoothly
                let card = btn.closest('.event-item');

                card.style.opacity = '0';
                card.style.transform = 'translateX(50px)';

              setTimeout(() => {

                if(document.querySelectorAll('.event-item').length === 0){
                    document.getElementById('eventModal').style.display = 'none';
                }

            }, 350);

            }

        });

    }

});

</script>
</body>
</html>