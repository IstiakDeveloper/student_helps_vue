<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\RolePermission\RolePermissionController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');


Route::get('/migrate-fresh-seed', function () {
    if (app()->environment('local')) {
        try {
            Artisan::call('migrate:fresh --seed');
            return response()->json(['message' => 'Migration and seeding completed successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to complete migration and seeding.'], 500);
        }
    } else {
        return response()->json(['message' => 'This operation is not allowed in the production environment.'], 403);
    }
});

Route::get('/migrate', function () {
    if (app()->environment('local')) {
        try {
            Artisan::call('migrate');
            return response()->json(['message' => 'Migration completed successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to complete migration.'], 500);
        }
    } else {
        return response()->json(['message' => 'This operation is not allowed in the production environment.'], 403);
    }
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Roles Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // Permissions Routes
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


    Route::prefix('role-permissions')->name('role-permissions.')->group(function () {
        Route::get('/', [RolePermissionController::class, 'index'])->name('index');
        Route::get('/create', [RolePermissionController::class, 'create'])->name('create');
        Route::post('/', [RolePermissionController::class, 'store'])->name('store');
        Route::get('/{role}/edit', [RolePermissionController::class, 'edit'])->name('edit'); // Add this line
        Route::put('/{role}', [RolePermissionController::class, 'update'])->name('update'); // Add this line
        Route::delete('/{role}', [RolePermissionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');

    });

});

Route::middleware(['auth'])->group(function () {
    Route::get('/student-profile', [StudentProfileController::class, 'index'])->name('student.profile.index');
    Route::post('/student-profile', [StudentProfileController::class, 'update'])->name('student.profile.update');

    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

    Route::put('/subscriptions/{id}/update-status', [SubscriptionController::class, 'updateStatus'])->name('subscriptions.updateStatus');

    Route::get('/subscriber', [SubscriberController::class, 'index'])->name('subscriber.index');


});

require __DIR__.'/auth.php';
