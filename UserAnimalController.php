<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserAnimalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $animals = Animal::when($search, function ($query) use ($search) {
            $query->where('animal_type', 'like', "%{$search}%");
        })->get();

        return view('UserPages.dashboard', compact('animals'));
    }

    public function create()
    {
        return view('UserPages.animals.create');
    }

   public function store(Request $request)
{

$lastVaccination = $request->last_vaccination;
$lastDeworming = $request->last_deworming;

$nextVaccination = $lastVaccination 
    ? Carbon::parse($lastVaccination)->addMonths(3)
    : null;

$nextDeworming = $lastDeworming 
    ? Carbon::parse($lastDeworming)->addMonths(3)
    : null;

Animal::create([
    'user_id' => auth()->id(),
    'animal_type' => $request->animal_type,
    'breed' => $request->breed,
    'status' => $request->status,

    'last_vaccination' => $lastVaccination,
    'next_vaccination' => $nextVaccination,

    'last_deworming' => $lastDeworming,
    'next_deworming' => $nextDeworming
]);

return redirect()->route('user.dashboard');
}

    public function edit($id)
    {

        $animal = Animal::findOrFail($id);

        return view('UserPages.animals.edit',compact('animal'));

    }

    public function update(Request $request, $id)
    {

    $animal = Animal::findOrFail($id);

    $nextVaccination = $request->last_vaccination
        ? Carbon::parse($request->last_vaccination)->addMonths(3)
        : null;

    $nextDeworming = $request->last_deworming
        ? Carbon::parse($request->last_deworming)->addMonths(3)
        : null;

    $animal->update([
        'animal_type' => $request->animal_type,
        'breed' => $request->breed,
        'status' => $request->status,

        'last_vaccination' => $request->last_vaccination,
        'next_vaccination' => $nextVaccination,

        'last_deworming' => $request->last_deworming,
        'next_deworming' => $nextDeworming
    ]);

    return redirect()->route('user.dashboard');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('user.dashboard');
    }

    public function delete($id)
    {

    $animal = Animal::findOrFail($id);

    $animal->delete();

    return redirect()->route('user.dashboard');

    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('UserPages.animals.show', compact('animal'));
    }
}
