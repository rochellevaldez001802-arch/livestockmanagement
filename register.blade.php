<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | Aparri Livestock Management</title>

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
padding:15px 5%;

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
        background: rgba(42, 102, 46, 0.6);
        color:white;
    }

/* GLASS EFFECT */

.glass{
background:rgba(255,255,255,0.2);
backdrop-filter:blur(18px);
-webkit-backdrop-filter:blur(18px);
border-radius:20px;
box-shadow:0 8px 32px rgba(0,0,0,0.3);
border:1px solid rgba(255,255,255,0.2);
}

/* WRAPPER */

.wrapper{
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
padding:10px 20px 20px 20px;
margin-top:-30px; 
}

/* CARD */

.card{
width:900px;
max-width:100%;
display:grid;
grid-template-columns:1fr 1.5fr;
overflow:hidden;
}

/* LEFT */

.left{
display:flex;
justify-content:center;
align-items:center;
padding:20px;
}

.left img{
width:100%;
max-width:300px;
}

/* RIGHT FORM */

.form{
padding:25px;
color:white;
}

/* GRID FORM */

.form-grid{
display:grid;
grid-template-columns:1fr 1.5fr;
gap:30px;
}

/* FULL WIDTH */

.full{
grid-column:span 2;
}

/* INPUT */

input{
width:100%;
padding:10px;
border:none;
border-radius:10px;
outline:none;
font-size:14px;
margin-top:-5px;
}

/* PASSWORD WRAP */

.password-wrapper{
position:relative;
}

.password-wrapper span{
position:absolute;
right:10px;
top:50%;
transform:translateY(-50%);
cursor:pointer;
font-size:13px;
color:#333;
}

/* BUTTON */

button{
margin-top:20px;
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

button:hover{
transform:scale(1.03);
background:linear-gradient(135deg,#22c55e,#16a34a);
}

/* IMAGE PREVIEW */

.preview{
width:80px;
height:80px;
border-radius:50%;
object-fit:cover;
margin-top:10px;
display:none;
}

.upload-box{
display:block;
padding:10px;
background:rgba(255,255,255,0.2);
border-radius:10px;
text-align:center;
cursor:pointer;
}

.upload-box input{
display:none;
}

/* Hide hamburger on desktop */
.menu-toggle {
    display: none;
    font-size: 28px;
    cursor: pointer;
    color: #0b3d1c;
}

/* Mobile styles */
/* Mobile styles */
@media (max-width: 768px) {

    /* NAVIGATION */
    nav {
        flex-wrap: wrap;
        position: relative;
        padding: 15px 5%;
        gap: 10px;
    }

    .menu-toggle {
        display: block; /* show hamburger */
    }

    .nav-links {
        display: none; /* hidden by default */
        flex-direction: column;
        width: 100%;
        gap: 10px;
        margin-top: 10px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(15px);
        border-radius: 10px;
        padding: 10px;
    }

    .nav-links a {
        padding: 10px;
        border-radius: 8px;
        width: 100%;
    }

    /* WRAPPER */
    .wrapper {
        padding: 20px;
        min-height: auto;
    }

    /* CARD */
    .card {
        display: flex;
        flex-direction: column; /* stack left + right */
        width: 100%;
        max-width: 400px;
        border-radius: 20px;
    }

    /* LEFT IMAGE */
    .left {
        padding: 20px 0;
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .left img {
        width: 70%;
        max-width: 200px;
        margin: auto;
    }

    /* FORM */
    .form {
        padding: 25px 15px;
    }

    .form h2 {
        font-size: 22px;
        text-align: center;
    }

    .form-grid {
        grid-template-columns: 1fr; /* single column */
        gap: 15px;
    }

    .full {
        grid-column: span 1;
    }

    input {
        font-size: 14px;
        padding: 10px;
    }

    button {
        font-size: 14px;
        padding: 12px;
    }
}

/* Extra small screens <480px */
@media (max-width: 480px) {
    nav .logo span {
        font-size: 14px;
    }

    .form h2 {
        font-size: 20px;
    }

    button {
        font-size: 13px;
        padding: 10px;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->

<nav>

<div class="logo">
<img src="{{ asset('images/aparri.png') }}">
<span>APARRI LIVESTOCK MANAGEMENT</span>
</div>

 <!-- Hamburger toggle -->
    <div class="menu-toggle" id="menuToggle">
        &#9776; <!-- ☰ icon -->
    </div>

<div class="nav-links"  id="navLinks">
<a href="/">Home</a>
<a href="/#about">About Us</a>
<a href="/#contact">Contact Us</a>
<a href="{{ route('login') }}">Login</a>
</div>

</nav>

<div class="wrapper">

<div class="card glass">

<!-- LEFT IMAGE -->
<div class="left">
<img src="{{ asset('images/farm-login.avif') }}">
</div>

<!-- FORM -->
<div class="form">

<h2>Create Account</h2>

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
@csrf

<div class="form-grid">

<input type="text" name="first_name" placeholder="First Name" required>
<input type="text" name="last_name" placeholder="Last Name" required>

<input type="date" name="birthday" required>
<input type="text" name="phone" placeholder="Contact Number" required>

<input type="text" name="address" placeholder="Address" class="full" required>

<input type="email" name="email" placeholder="Email" class="full" required>

<div class="password-wrapper">
<input type="password" name="password" id="password" placeholder="Password" required>
<span onclick="togglePassword()"></span>
</div>

<div class="password-wrapper">
<input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password" required>
<span onclick="togglePassword2()"></span>
</div>

<div class="full">
<label class="upload-box full">
    Upload Profile Picture
    <input type="file" name="profile_picture" accept="image/*" onchange="previewImage(event)">
</label>
<img id="preview" class="preview">
</div>

</div>

<button type="submit">REGISTER</button>

</form>

</div>

</div>

</div>

<script>

/* PASSWORD TOGGLE */

function togglePassword(){
let pass = document.getElementById('password');
let toggle = event.target;

if(pass.type === 'password'){
    pass.type = 'text';
    toggle.innerText = 'Hide';
}else{
    pass.type = 'password';
    toggle.innerText = 'Show';
}
}

function togglePassword2(){
let pass = document.getElementById('confirmPassword');
let toggle = event.target;

if(pass.type === 'password'){
    pass.type = 'text';
    toggle.innerText = 'Hide';
}else{
    pass.type = 'password';
    toggle.innerText = 'Show';
}
}

/* IMAGE PREVIEW */

function previewImage(event){
const preview = document.getElementById('preview');
preview.src = URL.createObjectURL(event.target.files[0]);
preview.style.display = 'block';
}

const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

menuToggle.addEventListener('click', () => {
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
});

</script>

</body>
</html>