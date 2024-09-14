<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        $isLoggedIn = Auth::check();

        // Pass the authentication status as a prop to the Vue component
        return Inertia::render('HomePage', [
            'isLoggedIn' => $isLoggedIn,
        ]);
    }
    
}
