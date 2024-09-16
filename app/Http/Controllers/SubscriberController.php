<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        // Fetch subscriptions along with user data
        $subscriptions = Subscription::with('user')->get();

        return inertia('Subscriber/Index', [
            'subscriptions' => $subscriptions,
        ]);
    }
}
