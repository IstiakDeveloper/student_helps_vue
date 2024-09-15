<?php

namespace App\Providers;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            'hasActiveSubscription' => function () {
                if (Auth::check()) {
                    $userId = Auth::id(); // Get the authenticated user ID

                    // Directly query the Subscription model
                    $subscriptions = Subscription::where('user_id', $userId)
                        ->where('status', 'approved') // Update 'active' to 'approved'
                        ->where('expires_at', '>', now())
                        ->get();

                    // Determine if there is an active subscription
                    return $subscriptions->isNotEmpty();
                }

                return false; // No subscription if user is not authenticated
            },
            // Other shared data
        ]);
    }
}
