<?php
namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnimalController extends Controller
{

public function index(Request $request)
{
    $search = $request->search;

    $animals = Animal::when($search,function($query) use ($search){
        $query->where('animal_type','like',"%$search%");
    })->get();

    return view('dashboard',compact('animals'));
}

public function create()
{
    return view('UserPages.animals.create');
}

public function store(Request $request)
{

Animal::create([
    'user_id' => auth()->id(),
    'animal_type' => $request->animal_type,
    'breed' => $request->breed,
    'status' => $request->status,

    'last_vaccination' => $request->last_vaccination,
    'last_deworming' => $request->last_deworming
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

$animal->update([
    'animal_type' => $request->animal_type,
    'breed' => $request->breed,
    'status' => $request->status,

    'last_vaccination' => $request->last_vaccination,
    'last_deworming' => $request->last_deworming
]);

return redirect()->route('user.dashboard');
}

public function destroy($id)
{
    Animal::destroy($id);
    return redirect()->route('user.dashboard');
}

}