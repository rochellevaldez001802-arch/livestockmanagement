<?php

namespace App\Http\Controllers;

use App\Models\User;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers = User::where('role','user')
        ->withCount('animals')
        ->latest()
        ->get();

        return view('AdminPages.farmer', compact('farmers'));
    }

    public function edit($id)
    {
        $farmer = \App\Models\User::findOrFail($id);
        return view('AdminPages.edit-farmer', compact('farmer'));
    }

    public function destroy($id)
    {
        \App\Models\User::destroy($id);

        return back()->with('success','Farmer deleted');
    }
}