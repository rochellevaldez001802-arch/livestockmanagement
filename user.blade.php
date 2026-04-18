<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aparri Livestock Management</title>
@vite(['resources/css/app.css','resources/js/app.js'])

<style>
body{
background:url('/images/background.png');
background-size:cover;
background-position:center;
font-family:Arial, sans-serif;
margin:0;
}

/* NAVBAR */
.user-navbar{
display:flex;
justify-content:space-between;
align-items:center;
padding:14px 30px;
background:rgba(255,255,255,0.95);
box-shadow:0 3px 10px rgba(0,0,0,0.12);
position:sticky;
top:0;
z-index:1000;
}

/* LOGO AREA */
.logo-area{
display:flex;
align-items:center;
gap:10px;
font-weight:bold;
color:#0b3d1c;
font-size:16px;
letter-spacing:1px;
}

.logo-area img{
height:38px;
}

/* NAVIGATION LINKS */
.user-links{
display:flex;
align-items:center;
gap:12px;
}

/* NAV LINKS - CLEAN DEFAULT STATE */
.nav-link{
text-decoration:none;
color:black; /* Neutral gray - NO green by default */
font-weight:500;
position:relative;
transition:0.3s ease;
padding:8px 16px;
border-radius:8px;
display:flex;
align-items:center;
gap:8px;
}

.nav-link i{
font-size:15px;
transition:0.3s ease;
opacity:0.7;
}

/* HOVER EFFECT - COLOR APPEARS ON HOVER */
.nav-link:hover{
color:#0b5e20 !important;
background:rgba(27, 49, 154, 0.08);
transform:translateY(-2px);
box-shadow:0 4px 12px rgba(11,93,32,0.15);
}

.nav-link:hover i{
transform:scale(1.1);
opacity:1;
color:#0b5e20 !important;
}

/* ACTIVE PAGE - FULL COLOR */
.nav-link.active{
color:white !important;
background: #42a65b!important;
box-shadow:0 6px 20px rgba(11,93,32,0.3);
font-weight:600;
}

.nav-link.active i{
transform:scale(1.1);
opacity:1;
color:white !important;
}

/* PROFILE BUTTON - ALSO NEUTRAL BY DEFAULT */
.profile-btn{
background:rgba(11,93,32,0.04);
border:2px solid rgba(11,93,32,0.1);
color:#6b7280;
padding:8px 16px;
border-radius:12px;
font-weight:500;
cursor:pointer;
transition:0.3s ease;
display:flex;
align-items:center;
gap:10px;
position:relative;
}

.profile-btn:hover{
background:#0b5e20;
color:white;
border-color:#0b5e20;
transform:translateY(-2px);
box-shadow:0 6px 20px rgba(11,93,32,0.25);
}

.nav-profile-img{
width:30px;
height:30px;
border-radius:50%;
object-fit:cover;
border:2px solid rgba(255,255,255,0.8);
transition:0.3s;
}

.profile-btn:hover .nav-profile-img{
border-color:#0b5e20;
transform:scale(1.05);
}

.nav-profile-name{
font-size:12px;
font-weight:500;
}

.profile-arrow{
transition:0.3s;
margin-left:4px;
opacity:0.7;
}

.profile-btn:hover .nav-profile-name,
.profile-btn:hover .profile-arrow{
opacity:1;
}

.profile-btn:hover .profile-arrow{
transform:rotate(180deg);
}

/* DROPDOWN */
.profile-dropdown{
position:absolute;
top:100%;
right:0;
background:white;
min-width:220px;
border-radius:12px;
box-shadow:0 10px 40px rgba(0,0,0,0.15);
border:1px solid rgba(11,93,32,0.1);
opacity:0;
visibility:hidden;
transform:translateY(-10px);
transition:0.3s ease;
margin-top:8px;
overflow:hidden;
}

.profile-dropdown.show{
opacity:1;
visibility:visible;
transform:translateY(0);
}

.dropdown-header{
padding:20px;
border-bottom:1px solid rgba(11,93,32,0.1);
background:linear-gradient(135deg, #f8fff9 0%, #e8f5e9 100%);
}

.profile-info{
display:flex;
align-items:center;
gap:12px;
}

.profile-info img{
width:50px;
height:50px;
border-radius:50%;
border:3px solid #0b5e20;
}

.profile-details h4{
margin:0;
font-size:16px;
color:#0b3d1c;
font-weight:600;
}

.profile-details p{
margin:2px 0 0 0;
color:#666;
font-size:13px;
}

.dropdown-item{
padding:14px 20px;
cursor:pointer;
display:flex;
align-items:center;
gap:12px;
transition:0.3s ease;
border-bottom:1px solid rgba(11,93,32,0.05);
text-decoration:none;
color:#374151;
font-weight:500;
width:100%;
border:none;
background:none;
text-align:left;
}

.dropdown-item:hover{
background:rgba(11,93,32,0.08);
color:#0b5e20;
padding-left:28px;
}

.dropdown-item i{
font-size:16px;
width:20px;
opacity:0.8;
}

.dropdown-item:hover i{
opacity:1;
}

.dropdown-item:last-child{
border-bottom:none;
color:#dc2626;
}

.dropdown-item:last-child:hover{
background:rgba(220,38,38,0.08);
color:#b91c1c;
}

/* PAGE CONTAINER */
.container{
padding:40px 8%;
min-height: calc(100vh - 80px);
}

/* RESPONSIVE */
@media (max-width:768px){
.user-navbar{
padding:14px 5%;
}
.user-links{
gap:15px;
}
.nav-link{
padding:6px 12px;
font-size:14px;
}
.profile-btn{
padding:6px 12px;
flex-direction:column;
gap:4px;
text-align:center;
}
.nav-profile-name{
font-size:13px;
}
}
.notif-btn{
    position:relative;
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#f3f4f6;
    cursor:pointer;
    transition:0.3s;
}

.notif-btn:hover{
    background:#e5e7eb;
}
.notif-badge{
    position:absolute;
    top:-5px;
    right:-5px;
    background:red;
    color:white;
    font-size:11px;
    padding:2px 6px;
    border-radius:50%;
    font-weight:bold;
}
</style>
</head>

<body>
<!-- NAVBAR -->
<div class="user-navbar">
<div class="logo-area">
<img src="{{ asset('images/aparri.png') }}">
APARRI LIVESTOCK MANAGEMENT
</div>

<div class="user-links">
<a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
Dashboard
</a>
<a href="{{ route('support.index') }}" class="nav-link {{ request()->routeIs('support.index') ? 'active' : '' }}">
Support
</a>


<!-- PROFILE DROPDOWN -->
<div class="profile-container" style="position:relative;">
<button class="profile-btn" id="profileBtn">

<img src="{{ auth()->user()->profile_picture 
? asset(auth()->user()->profile_picture) 
: asset('images/default-profile.jpg') }}" 
class="nav-profile-img">

<span class="nav-profile-name">{{ auth()->user()->first_name }}</span>
<span class="profile-arrow">▼</span>

</button>

<div class="profile-dropdown" id="profileDropdown">
<div class="dropdown-header">
<div class="profile-info">
<img src="{{ auth()->user()->profile_picture 
? asset(auth()->user()->profile_picture) 
: asset('images/default-profile.jpg') }}" 
class="nav-profile-img">
<div class="profile-details">
<h4>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h4>
<p>{{ auth()->user()->email ?? 'user@example.com' }}</p>
</div>
</div>
</div>
<a href="{{ route('profile.edit') }}" class="dropdown-item">
👤 Profile
</a>
<form method="POST" action="{{ route('logout') }}" style="margin:0;">
@csrf
<button type="submit" class="dropdown-item">
🚪 Logout
</button>
</form>
</div>
</div>
<div class="notif-btn" onclick="toggleNotifModal()">
    🔔

    @if(auth()->user()->unreadNotifications->count() > 0)
        <span class="notif-badge">
            {{ auth()->user()->unreadNotifications->count() }}
        </span>
    @endif
</div>

</div>
</div>

<!-- MAIN CONTENT -->
<div class="container">
@yield('content')
</div>

<div id="notifModal" style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    z-index:999;
">

<div style="
    background:white;
    width:400px;
    max-height:500px;
    overflow:auto;
    margin:80px auto;
    padding:20px;
    border-radius:12px;
">

<h3 style="margin-bottom:15px;">🔔 Notifications</h3>

@forelse(auth()->user()->notifications()->latest()->get() as $note)
    <div style="
        padding:10px;
        border-bottom:1px solid #eee;
        {{ $note->is_read ? '' : 'background:#ecfdf5;' }}
    ">
        <strong>{{ $note->title }}</strong>
        <p style="font-size:13px;">{{ $note->message }}</p>
        <small>{{ $note->created_at->diffForHumans() }}</small>

        @if(!$note->is_read)
        <form method="POST" action="{{ route('notifications.read', $note->id) }}">
            @csrf
            <button style="
                margin-top:5px;
                background:#0b5e20;
                color:white;
                border:none;
                padding:5px 10px;
                border-radius:6px;
                cursor:pointer;">
                ✔ Done
            </button>
        </form>
        @endif
    </div>
@empty
    <p>No notifications</p>
@endforelse

<button onclick="toggleNotifModal()" style="margin-top:10px;">Close</button>

</div>
</div>

<script>
// Profile dropdown toggle
const profileBtn = document.getElementById('profileBtn');
const profileDropdown = document.getElementById('profileDropdown');

// Toggle dropdown
profileBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    profileDropdown.classList.toggle('show');
});

// Prevent closing when clicking inside dropdown
profileDropdown.addEventListener('click', function(e){
    e.stopPropagation();
});

// Close when clicking outside
document.addEventListener('click', function() {
    profileDropdown.classList.remove('show');
});

function toggleNotifModal(){
    let modal = document.getElementById('notifModal');
    modal.style.display = modal.style.display === 'none' ? 'block' : 'none';
}

</script>

</body>
</html>