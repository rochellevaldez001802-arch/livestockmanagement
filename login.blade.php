<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Aparri Livestock Management</title>

<style>

body{
margin:0;
font-family:Arial, sans-serif;
background:url('/images/background.png');
background-size:cover;
background-position:center;
}

/* NAVBAR */

nav{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 8%;
}

.logo{
display:flex;
align-items:center;
gap:10px;
font-weight:bold;
color:#0b3d1c;
}

.logo img{
height:40px;
}

.nav-links a {
        margin-left: 10px;
        text-decoration: none;
        color: #0b3d1c;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

.nav-links a:hover {
        background: rgba(42, 102, 46, 0.1);
        color:white;
    }

/* LOGIN WRAPPER */

.login-wrapper{
display:flex;
justify-content:center;
align-items:center;
height:70vh;
}

/* MAIN CARD */

.login-container{
width:900px;
display:flex;
border-radius:20px;
overflow:hidden;

/* REMOVE this */
box-shadow:none;
}

/* LEFT SIDE IMAGE */

.login-image{
flex:1;
display:flex;
align-items:center;
justify-content:center;
border-right:1px solid rgba(255,255,255,0.2);
}

.login-image img{
width:80%;
}

/* RIGHT SIDE FORM */

.login-card{
flex:1;
padding:50px;
color:white;
}

.login-card h2{
margin-bottom:20px;
}

/* FORM */

.login-card label{
display:block;
text-align:left;
font-size:14px;
margin-top:12px;
}

.login-card input{
width:100%;
padding:10px;
margin-top:5px;
border:none;
border-radius:20px;
outline:none;
background:rgba(255,255,255,0.8);
color:#000;
}

.login-btn{
margin-top:25px;
width:100%;
padding:12px;
border:none;
border-radius:25px;
background:linear-gradient(135deg,#4ade80,#22c55e);
color:white;
font-weight:bold;
cursor:pointer;
transition:0.3s;
}

.login-btn:hover{
transform:scale(1.03);
background:linear-gradient(135deg,#22c55e,#16a34a);
}

.glass{
background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
-webkit-backdrop-filter:blur(15px);
border-radius:20px;
box-shadow:0 8px 32px rgba(0,0,0,0.3);
border:1px solid rgba(255,255,255,0.2);
}

/* FOOTER */

.footer{
background:#eee;
padding:20px;
display:flex;
justify-content:center;
gap:40px;
font-size:14px;
}

.footer div{
display:flex;
align-items:center;
gap:8px;
}

/* Hide hamburger on desktop */
.menu-toggle {
    display: none;
    font-size: 28px;
    cursor: pointer;
    color: #0b3d1c;
}

/* Mobile styles */
@media (max-width: 768px) {
    nav {
        flex-wrap: wrap;
        position: relative;
        padding: 15px 5%;
    }

    .nav-links {
        display: none; /* hide links initially */
        flex-direction: column;
        width: 100%;
        gap: 10px;
        margin-top: 10px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(15px);
        border-radius: 10px;
        padding: 10px;
    }

    .nav-links a {
        padding: 10px;
        border-radius: 8px;
        width: 100%;
    }

    .menu-toggle {
        display: block; /* show hamburger */
    }
    .login-wrapper {
        height: auto; /* let content expand */
        padding: 20px;
    }

    .login-container {
        flex-direction: column; /* stack left + right */
        width: 100%;
        max-width: 400px; /* fits mobile */
        border-radius: 15px;
    }

    .login-image {
        border-right: none; /* remove divider */
        border-bottom: 1px solid rgba(255,255,255,0.2); /* optional divider */
        padding: 20px 0;
    }

    .login-image img {
        width: 70%; /* smaller image */
        margin: auto;
    }

    .login-card {
        padding: 30px 20px;
    }

    .login-card h2 {
        font-size: 20px;
        text-align: center;
    }

    .login-card input {
        font-size: 14px;
    }

    .login-btn {
        font-size: 14px;
        padding: 10px;
    }
}

</style>
</head>

<body>


<nav>
    <div class="logo">
        <img src="{{ asset('images/aparri.png') }}">
        <span>APARRI LIVESTOCK MANAGEMENT</span>
    </div>

    <!-- Hamburger toggle -->
    <div class="menu-toggle" id="menuToggle">
        &#9776; <!-- ☰ icon -->
    </div>

    <div class="nav-links" id="navLinks">
        <a href="/">Home</a>
        <a href="/#about">About Us</a>
        <a href="/#contact">Contact Us</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</nav>


<div class="login-wrapper">

<div class="login-container glass">

<!-- LEFT ILLUSTRATION -->
<div class="login-image">
<img src="{{ asset('images/farm-login.avif') }}">
</div>

<!-- RIGHT LOGIN FORM -->
<div class="login-card">

<h2>Welcome Back</h2>

<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
@csrf

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<button class="login-btn">LOGIN</button>

@if (Route::has('register'))
<p style="margin-top:15px;font-size:13px;">
Don't have an account?
<a href="{{ route('register') }}" style="color:#a5f3a5;">Register</a>
</p>
@endif

</form>

</div>

</div>

</div>
<script>
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

menuToggle.addEventListener('click', () => {
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
});
</script>


</body>
</html>