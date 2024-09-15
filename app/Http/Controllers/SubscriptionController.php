<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function index()
    {
        // Fetch subscriptions for the authenticated user
        $subscriptions = Subscription::where('user_id', auth()->id())
            ->orderBy('expires_at', 'desc')
            ->get();

        // Pass the subscriptions data to the Inertia page
        return Inertia::render('Subscription/Index', [
            'subscriptions' => $subscriptions
        ]);
    }
    public function create()
    {
        return inertia('Subscription/Create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'months' => 'required|integer|min:1',
            'payment_method' => 'required|in:Cash,Bank',
            'transaction_id' => 'required_if:payment_method,Bank',
        ]);

        // Calculate the expiration date
        $expiresAt = Carbon::now()->addMonths($request->months);

        // Create the subscription
        Subscription::create([
            'user_id' => Auth::id(),
            'months' => $request->months,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'status' => 'pending',
            'expires_at' => $expiresAt,
        ]);

        // Redirect with success message
        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully, awaiting approval.');
    }
}
