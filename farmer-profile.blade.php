@extends('layouts.admin')

@section('content')

<div class="farmer-page">

    <!-- LEFT SIDE (PROFILE) -->
    <div class="farmer-card">

        <div class="farmer-cover"></div>

        <div class="farmer-avatar">
           <img src="{{ $farmer->profile_picture 
                ? asset($farmer->profile_picture) 
                : asset('images/default-profile.jpg') }}">
        </div>

        <h3 class="username">{{ $farmer->first_name }} {{ $farmer->last_name }}</</h3>

        <div class="farmer-info">

            <p><strong>Name:</strong> {{ $farmer->first_name }} {{ $farmer->last_name }}</</p>

            <p><strong>Age:</strong> {{ $farmer->age ?? '--' }}</p>

            <p><strong>Address:</strong> {{ $farmer->address ?? '--' }}</p>

            <p><strong>Email:</strong> {{ $farmer->email }}</p>

            <p><strong>Contact:</strong> {{ $farmer->phone ?? '--' }}</p>

        </div>

    </div>


    <!-- RIGHT SIDE (ANIMAL TABLE) -->
    <div class="animal-card">

        <div class="animal-header">

            <h3>Registered Animals ({{ $animals->count() }})</h3>

            <input type="text" placeholder="Search animal..." class="search-box">

        </div>

        <div class="animal-table">

            <table>

                <thead>
                    <tr>
                        <th>Animal</th>
                        <th>Last Vaccination</th>
                        <th>Next Vaccination</th>
                        <th>Last Deworming</th>
                        <th>Next Deworming</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($animals as $animal)

                    <tr>
                        <td>{{ $animal->animal_type }}</td>

                        <td>
                        {{ $animal->last_vaccination ? $animal->last_vaccination->format('M d Y') : '--' }}
                        </td>

                        <td>
                        {{ $animal->next_vaccination ? $animal->next_vaccination->format('M d Y') : '--' }}
                        </td>
                        <td>
                        {{ $animal->last_deworming ? $animal->last_deworming->format('M d Y') : '--' }}
                        </td>
                        <td>
                        {{ $animal->next_deworming ? $animal->next_deworming->format('M d Y') : '--' }}
                        </td>

                        <td>
                        <span class="status {{ strtolower($animal->status) }}">
                        {{ $animal->status }}
                        </span>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection