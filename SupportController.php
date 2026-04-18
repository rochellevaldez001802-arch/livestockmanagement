<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
{
    return view('UserPages.support');
}

public function store(Request $request)
{
    // save to database
    \App\Models\Support::create([
        'user_id' => auth()->id(),
        'type' => $request->type,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Request submitted!');
}
}
