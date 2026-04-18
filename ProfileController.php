<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Animal;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


public function edit(Request $request)
{
    $animals_count = $request->user()->animals()->count();

    return view('profile.edit', [
        'user' => $request->user(),
        'animals_count' => $animals_count,
    ]);
}

    /**
     * Update the user's profile information.
     */
 public function update(Request $request)
{
    $user = auth()->user();

    if ($user->role === 'admin') {

        // ADMIN: full control
        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'birthday'   => $request->birthday,
        ]);

    } else {

        // FARMER: limited fields (adjust if you want)
        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'address'    => $request->address,
        ]);

    }

    return back()->with('success', 'Profile updated!');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function upload(Request $request)
{
    $request->validate([
        'profile_picture' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if($request->hasFile('profile_picture')){
        $file = $request->file('profile_picture');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);

        auth()->user()->update([
            'profile_picture' => $filename
        ]);
    }

    return back()->with('success','Profile updated!');
}
}
