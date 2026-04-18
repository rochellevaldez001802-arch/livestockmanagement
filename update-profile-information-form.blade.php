@extends('layouts.user')

@section('content')

<section class="profile-section" style="max-width: 650px; margin: 40px auto;">

<div class="profile-card">

    <!-- HEADER -->
    <div class="profile-header">

        <!-- PROFILE IMAGE -->
        <img id="previewImage"
            src="{{ auth()->user()->profile_picture 
                ? asset(auth()->user()->profile_picture) 
                : asset('images/default-profile.jpg') }}"
            style="
                width:110px;
                height:110px;
                border-radius:50%;
                object-fit:cover;
                display:block;
                margin:0 auto 15px;
                border:4px solid #42a65b;
                box-shadow:0 8px 20px rgba(0,0,0,0.2);
            ">

        <!-- UPLOAD BUTTON -->
        <input type="file" 
            name="profile_picture" 
            form="profileForm"
            accept="image/*" 
            onchange="previewImage(event)"
            style="display:block; margin:10px auto;">

        <h1 class="profile-title">👤 Profile Information</h1>
        <p class="profile-subtitle">Update your personal details</p>
    </div>

    <!-- MAIN FORM -->
    <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="input-group">
                <label class="input-label">First Name</label>
                <input type="text" name="first_name"
                    value="{{ old('firstname', auth()->user()->first_name) }}"
                    class="premium-input" required>
            </div>

            <div class="input-group">
                <label class="input-label">Last Name</label>
                <input type="text" name="last_name"
                    value="{{ old('last_name', auth()->user()->last_name) }}"
                    class="premium-input" required>
            </div>

            <div class="input-group full-width">
                <label class="input-label">Email</label>
                <input type="email" name="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    class="premium-input" required>
            </div>

            <div class="input-group">
                <label class="input-label">Contact</label>
                <input type="text" name="contact"
                    value="{{ old('phone', auth()->user()->phone) }}"
                    class="premium-input">
            </div>

            <div class="input-group">
                <label class="input-label">Address</label>
                <input type="text" name="address"
                    value="{{ old('address', auth()->user()->address) }}"
                    class="premium-input">
            </div>

        </div>

        <div class="form-buttons">
            <button type="submit" class="save-btn">💾 Save Changes</button>

            @if (session('status') === 'profile-updated')
                <div class="success-msg">✅ Profile updated!</div>
            @endif
        </div>
    </form>

</div>

</section>

<!-- STYLES -->
<style>
.profile-card{
background: rgba(255,255,255,0.95);
border-radius:25px;
padding:40px;
box-shadow:0 20px 60px rgba(0,0,0,0.2);
}

.profile-header{
text-align:center;
}

.form-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
margin-top:20px;
}

.full-width{
grid-column:span 2;
}

.premium-input{
width:100%;
padding:14px;
border-radius:12px;
border:1px solid #ddd;
}

.form-buttons{
margin-top:25px;
text-align:center;
}

.save-btn{
padding:12px 30px;
border:none;
background:#42a65b;
color:white;
border-radius:20px;
cursor:pointer;
}

.success-msg{
color:green;
margin-top:10px;
}
</style>

<!-- SCRIPT -->
<script>
function previewImage(event){
    const file = event.target.files[0];
    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(e){
        document.getElementById('previewImage').src = e.target.result;
    }

    reader.readAsDataURL(file);
}
</script>

@endsection