@extends('layouts.admin')

@section('content')
<style>
    .farmers-page{
padding:30px;
}

.page-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.page-header h2{
color:#0b5e20;
}

#searchInput{
padding:10px 15px;
border-radius:20px;
border:1px solid #ccc;
width:250px;
}

/* TABLE */
.table-card{
background:white;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
overflow:hidden;
}

table{
width:100%;
border-collapse:collapse;
}

thead{
background:#0b5e20;
color:white;
}

th, td{
padding:15px;
text-align:left;
}

tbody tr{
border-bottom:1px solid #eee;
transition:0.2s;
}

tbody tr:hover{
background:#f6fff6;
}

/* PROFILE IMAGE */
.table-img{
width:45px;
height:45px;
border-radius:50%;
object-fit:cover;
}

/* BUTTONS */
.actions-btns{
display:flex;
gap:8px;
}

.btn{
padding:6px 12px;
border:none;
border-radius:8px;
cursor:pointer;
font-size:13px;
text-decoration:none;
}

.btn.view{
background:#3b82f6;
color:white;
}

.btn.edit{
background:#f59e0b;
color:white;
}

.btn.delete{
background:#ef4444;
color:white;
}
</style>

<div class="farmers-page">
    

    <!-- HEADER -->
    <div class="page-header">
        <h2>👨‍🌾 Farmer Management</h2>

        <div class="actions">
            <input type="text" id="searchInput" placeholder="Search farmer...">
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-card">
        <table>
          <thead>
            <tr>
            <th>Profile</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Animals</th>
            <th>Joined</th>
            <th>Actions</th>
            </tr>
            </thead>

            <tbody id="farmerTable">
                @forelse($farmers as $farmer)
                <tr>
                    <td>
                        <img src="{{ $farmer->profile_picture 
                        ? asset($farmer->profile_picture) 
                        : asset('images/default-profile.jpg') }}"
                            class="table-img">
                    </td>

                    <td>{{ $farmer->first_name }} {{ $farmer->last_name }}</td>
                    <td>{{ $farmer->email }}</td>
                    <td>{{ $farmer->phone ?? '--' }}</td>
                    <td>{{ $farmer->address ?? '--' }}</td>
                    <td>{{ $farmer->animals_count ?? 0 }}</td>
                    <td>{{ $farmer->created_at->format('M d, Y') }}</td>


                    <td class="actions-btns">

                        <!-- VIEW -->
                        <a href="{{ route('admin.farmer.profile',$farmer->id) }}" class="btn view">View</a>
                        <!-- DELETE -->
                        <form action="{{ route('admin.farmer.delete',$farmer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No farmers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    

</div>
<script>
let timer;

document.getElementById('searchInput').addEventListener('keyup', function() {
    clearTimeout(timer);

    timer = setTimeout(() => {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#farmerTable tr');

        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    }, 300); // delay
});
</script>


@endsection