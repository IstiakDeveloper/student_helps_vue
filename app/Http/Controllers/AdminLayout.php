<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminLayout extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hasActiveSubscription = $user->hasActiveSubscription();

        return Inertia::render('AdminLayout', [
            'hasActiveSubscription' => $hasActiveSubscription,
            // other data you want to pass
        ]);
    }
}
