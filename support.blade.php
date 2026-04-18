@extends('layouts.user')

@section('content')

<style>
.container{
max-width:700px;
margin:auto;
padding:20px;
}

.card{
background:white;
padding:25px;
border-radius:12px;
box-shadow:0 4px 10px rgba(0,0,0,0.08);
}

.title{
font-size:20px;
font-weight:600;
margin-bottom:15px;
color:#166534;
}

.input-group{
margin-bottom:15px;
}

input, textarea, select{
width:100%;
padding:10px;
border:1px solid #ddd;
border-radius:8px;
}

button{
background:#16a34a;
color:white;
padding:10px;
border:none;
border-radius:8px;
cursor:pointer;
width:100%;
}

button:hover{
background:#15803d;
}
</style>

<div class="container">

<div class="card">
    <div class="title">📥 Request / Support</div>

    <form action="{{ route('user.support.store') }}" method="POST">
        @csrf

        <div class="input-group">
            <label>Request Type</label>
            <select name="type" required>
                <option value="">Select</option>
                <option value="schedule">Schedule Change</option>
                <option value="issue">Report Issue</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="input-group">
            <label>Subject</label>
            <input type="text" name="subject" required>
        </div>

        <div class="input-group">
            <label>Message</label>
            <textarea name="message" rows="5" required></textarea>
        </div>

        <button type="submit">Submit Request</button>
    </form>
</div>

</div>

@endsection