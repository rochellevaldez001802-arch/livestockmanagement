<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Notification;

class LivestockController extends Controller
{
   public function index(Request $request)
{
    $query = Animal::with('user')
        ->whereHas('user', function ($q) {
            $q->where('role', 'user');
        });

    if ($request->search) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('animal_type', 'LIKE', "%$search%")
              ->orWhere('breed', 'LIKE', "%$search%")
              ->orWhereHas('user', function ($q2) use ($search) {
                  $q2->where('first_name', 'LIKE', "%$search%")
                     ->orWhere('last_name', 'LIKE', "%$search%");
              });
        });
    }

    $animals = $query->latest()->get();

    // ✅ AJAX response
    if ($request->ajax()) {
        return view('AdminPages.partials.livestock-table', compact('animals'))->render();
    }

    return view('AdminPages.livestock', compact('animals'));
}

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('AdminPages.edit-livestock', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $animal->update([
            'animal_type' => $request->animal_type,
            'breed' => $request->breed,
            'status' => $request->status,
            'last_vaccination' => $request->last_vaccination,
            'next_vaccination' => $request->next_vaccination,
            'last_deworming' => $request->last_deworming,
            'next_deworming' => $request->next_deworming
        ]);

        return redirect()->route('livestock')
        ->with('success','Livestock updated successfully');
    }

    public function destroy($id)
    {
        Animal::destroy($id);

        return redirect()->route('livestock')
        ->with('success','Livestock deleted');
    }
   

public function markDone(Request $request, $id)
{
    $animal = Animal::findOrFail($id);

    if ($request->type === 'vaccine') {
        $animal->last_vaccination = now();
        $animal->next_vaccination = now()->addMonths(6); // auto next
    }

    if ($request->type === 'deworm') {
        $animal->last_deworming = now();
        $animal->next_deworming = now()->addMonths(3);
    }

    $animal->save();

    return response()->json([
        'success' => true,
        'new_date' => $request->type === 'vaccine'
            ? $animal->next_vaccination
            : $animal->next_deworming
    ]);

    Notification::create([
    'user_id' => $animal->user_id,
    'title' => 'Livestock Update',
    'message' => $request->type === 'vaccine'
        ? 'Your animal has been vaccinated. Next schedule updated.'
        : 'Your animal has been dewormed. Next schedule updated.'
    ]);
}
}