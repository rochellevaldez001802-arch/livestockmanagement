@extends('layouts.admin')

@section('content')

<style>
.settings-container{
    max-width:900px;
    margin:auto;
    background:#fff;
    border-radius:15px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

/* HEADER */
.settings-header{
    display:flex;
    gap:20px;
    margin-bottom:25px;
}

.settings-header button{
    border:none;
    padding:8px 16px;
    border-radius:20px;
    background:#eee;
    cursor:pointer;
}

.settings-header .active{
    background:#6c63ff;
    color:white;
}

/* PROFILE IMAGE */
.profile-section{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:25px;
}

.profile-section img{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #ddd;
}

/* FORM GRID */
.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group.full{
    grid-column:1/3;
}

.form-group label{
    font-size:13px;
    margin-bottom:5px;
    color:#555;
}

.form-group input{
    padding:10px;
    border-radius:8px;
    border:1px solid #ddd;
}

/* BUTTON */
.save-btn{
    margin-top:35px;
    background:#6c63ff;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:20px;
    float:right;
    cursor:pointer;
}
</style>

<div class="settings-container">

    <!-- HEADER TABS -->
    <div class="settings-header">
        <button class="active">Edit Profile</button>
        <button>Preferences</button>
        <button>Security</button>
        <button>Data Privacy</button>
    </div>

    <!-- PROFILE IMAGE -->
    <div class="profile-section">
        <img src="{{ auth()->user()->profile_picture 
            ? asset('images/'.auth()->user()->profile_picture) 
            : asset('images/default-profile.jpg') }}">

        <form action="{{ route('admin.profile.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture">
            <button type="submit">Upload</button>
        </form>
    </div>

    <!-- FORM -->
    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

       <div class="form-grid">

        <!-- FIRST & LAST -->
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" 
            value="{{ old('first_name', auth()->user()->first_name) }}">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" 
            value="{{ old('last_name', auth()->user()->last_name) }}">
        </div>

        <!-- EMAIL & ADDRESS -->
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" 
            value="{{ old('email', auth()->user()->email) }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" 
            value="{{ old('address', auth()->user()->address) }}">
        </div>

        <!-- PHONE & BIRTHDAY -->
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" 
            value="{{ old('phone', auth()->user()->phone) }}">
        </div>

        <div class="form-group">
            <label>Birthday</label>
            <input type="date" name="birthday" 
            value="{{ old('birthday', auth()->user()->birthday) }}">
        </div>

    </div>

        <button class="save-btn">Save Changes</button>

    </form>

</div>

@endsection