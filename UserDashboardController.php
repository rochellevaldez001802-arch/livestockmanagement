<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Notification;

class UserDashboardController extends Controller
{

public function index(Request $request)
{
    $userId = auth()->id();

    $query = Animal::where('user_id', $userId);

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('animal_type', 'LIKE', '%' . $request->search . '%')
              ->orWhere('breed', 'LIKE', '%' . $request->search . '%');
        });
    }

    $animals = $query->get();

    $today = Carbon::today();
    $limit = Carbon::today()->addDays(3);

    $vaccineReminder = Animal::where('user_id', $userId)
        ->whereBetween('next_vaccination', [$today, $limit])
        ->count();

    $dewormReminder = Animal::where('user_id', $userId)
        ->whereBetween('next_deworming', [$today, $limit])
        ->count();

    // 🔥 AUTO GENERATE NOTIFICATIONS
    if ($vaccineReminder > 0) {
        Notification::updateOrCreate(
            ['user_id' => $userId, 'title' => 'Vaccination Alert'],
            [
                'message' => $vaccineReminder . ' animal(s) need vaccination within 3 days.',
                'is_read' => false
            ]
        );
    }

    if ($dewormReminder > 0) {
        Notification::updateOrCreate(
            ['user_id' => $userId, 'title' => 'Deworming Alert'],
            [
                'message' => $dewormReminder . ' animal(s) need deworming within 3 days.',
                'is_read' => false
            ]
        );
    }

    // 📩 FETCH NOTIFICATIONS
    $notifications = Notification::where('user_id', $userId)
        ->latest()
        ->take(5)
        ->get();

    // ✅ MARK AS READ
    Notification::where('user_id', $userId)
        ->where('is_read', false)
        ->update(['is_read' => true]);

    return view('UserPages.dashboard', compact(
        'animals',
        'vaccineReminder',
        'dewormReminder',
        'notifications'
    ));
}

}