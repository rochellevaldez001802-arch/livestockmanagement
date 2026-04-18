<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Auth;
use App\Models\user;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        if(auth()->user()->role === 'admin'){
            return view('layouts.admin.app');

        }
        elseif(auth()->user()->role === 'user')
            {
                  return view('layouts.user.app');

            }
    
    }
}
