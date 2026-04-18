<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Stats
        $totalAnimals = Animal::count();
        $aliveAnimals = Animal::where('status', 'Alive')->count();
        $soldAnimals = Animal::where('status', 'Sold')->count();
        $deadAnimals = Animal::where('status', 'Dead')->count();

        // Livestock distribution
        $cattleCount = Animal::where(function($q) {
            $q->where('animal_type', 'like', '%cow%')
              ->orWhere('animal_type', 'like', '%cattle%')
              ->orWhere('breed', 'like', '%holstein%')
              ->orWhere('breed', 'like', '%angus%')
              ->orWhere('breed', 'like', '%jersey%');
        })->count();
        $pigCount = Animal::where(function($q) {
            $q->where('animal_type', 'like', '%pig%')
              ->orWhere('breed', 'like', '%yorkshire%')
              ->orWhere('breed', 'like', '%berkshire%')
              ->orWhere('breed', 'like', '%duroc%');
        })->count();
        $goatCount = Animal::where(function($q) {
            $q->where('animal_type', 'like', '%goat%')
              ->orWhere('breed', 'like', '%nubian%')
              ->orWhere('breed', 'like', '%boer%');
        })->count();
        $chickenCount = Animal::where(function($q) {
            $q->where('animal_type', 'like', '%chicken%')
              ->orWhere('animal_type', 'like', '%hen%')
              ->orWhere('breed', 'like', '%rhode island%')
              ->orWhere('breed', 'like', '%leghorn%');
        })->count();

        // Registered farmers (users with role 'user')
        $farmers = User::where('role', 'user')->take(3)->get();

        // Calendar events: upcoming vaccinations
        $upcomingVaccinations = Animal::whereNotNull('next_vaccination')
            ->where('next_vaccination', '>=', now())
            ->orderBy('next_vaccination')
            ->take(10)
            ->get();

       $events = [];

        // ✅ Vaccination events
        $vaccinations = Animal::whereDate('next_vaccination', '>=', now())->get();

       foreach ($vaccinations as $animal) {
            $events[] = [
                'title' => 'Vaccination',
                'start' => \Carbon\Carbon::parse($animal->next_vaccination)->format('Y-m-d'),
                'type'  => 'vaccine',
                'animal' => $animal->animal_type,
                'owner' => $animal->user->first_name . ' ' . $animal->user->last_name,
                'id' => $animal->id
            ];
        }

        // ✅ Deworming events
        $dewormings   = Animal::whereDate('next_deworming', '>=', now())->get();

        foreach ($dewormings as $animal) {
            $events[] = [
                'title' => 'Deworming',
                'start' => \Carbon\Carbon::parse($animal->next_deworming)->format('Y-m-d'),
                'type'  => 'deworm',
                'animal' => $animal->animal_type,
                'owner' => $animal->user->first_name . ' ' . $animal->user->last_name,
                'id' => $animal->id
            ];
        }

        // Chart data
        $chartData = [$cattleCount, $pigCount, $goatCount, $chickenCount];

        return view('AdminPages.dashboard', compact(
            'totalAnimals',
            'aliveAnimals',
            'soldAnimals',
            'deadAnimals',
            'cattleCount',
            'pigCount',
            'goatCount',
            'chickenCount',
            'farmers',
            'events',
            'chartData'
        ));
    }

    public function farmerProfile($id)
    {

    $farmer = User::findOrFail($id);

    $animals = Animal::where('user_id',$id)->get();

    return view('AdminPages.farmer-profile',compact('farmer','animals'));

    }
}