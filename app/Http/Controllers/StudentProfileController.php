<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class StudentProfileController extends Controller
{
    public function index(): Response
    {
        $user = Auth::user();

        return Inertia::render('ProfilePage', [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'city' => $user->city,
                'service' => $user->service,
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'service' => 'nullable|string|in:Job,Accommodation,Settlement',
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'service' => $request->service,
        ]);

        // Update password if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('student.profile.index')->with('success', 'Profile updated successfully.');
    }
}
