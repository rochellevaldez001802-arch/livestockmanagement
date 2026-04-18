<section class="password-section">

<style>
.password-card{
background:#f9fafb;
border:1px solid #e5e7eb;
padding:25px;
border-radius:15px;
}

.password-title{
font-size:18px;
font-weight:600;
color:#0b5e20;
}

.password-text{
font-size:14px;
color:#666;
margin-top:5px;
}

/* INPUT */
.input-group{
margin-top:15px;
}

.input-group label{
font-size:13px;
font-weight:500;
color:#374151;
}

.input-group input{
width:100%;
padding:10px;
border-radius:8px;
border:1px solid #ccc;
margin-top:5px;
transition:0.3s;
}

.input-group input:focus{
border-color:#0b5e20;
outline:none;
box-shadow:0 0 0 2px rgba(11,94,32,0.2);
}

/* BUTTON */
.save-btn{
margin-top:20px;
padding:10px 20px;
background:#0b5e20;
color:white;
border:none;
border-radius:20px;
cursor:pointer;
font-weight:500;
transition:0.3s;
}

.save-btn:hover{
background:#084917;
}

/* SUCCESS MESSAGE */
.success-msg{
margin-left:10px;
font-size:13px;
color:#16a34a;
}
</style>

<div class="password-card">

    <div class="password-title">🔐 Update Password</div>
    <div class="password-text">
        Use a strong password to keep your account secure.
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="input-group">
            <label>Current Password</label>
            <input type="password" name="current_password">
            @error('current_password')
                <div style="color:red;font-size:12px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group">
            <label>New Password</label>
            <input type="password" name="password">
            @error('password')
                <div style="color:red;font-size:12px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <div style="display:flex;align-items:center;">
            <button class="save-btn">Save Password</button>

            @if (session('status') === 'password-updated')
                <span class="success-msg">✔ Updated!</span>
            @endif
        </div>

    </form>

</div>

</section>