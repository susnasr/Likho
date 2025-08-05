<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string', 'max:20'],
            'location' => ['required', 'string', 'max:25'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'profile_image' => ['nullable', 'file'], // Allow any file type
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'bio' => $request->bio,
        ];

        if ($request->hasFile('profile_image')) {
            try {
                $file = $request->file('profile_image');
                $maxSize = 10240; // 10MB in KB
                if ($file->getSize() / 1024 > $maxSize) {
                    return back()->withErrors(['profile_image' => 'File size must be less than 10MB.']);
                }
                $path = $file->store('profile_images', 'public');
                $userData['profile_image'] = $path; // Matches DB column
            } catch (\Exception $e) {
                // Keep only error logging
                \Log::error('Profile photo upload failed: ' . $e->getMessage());
                return back()->withErrors(['profile_image' => 'Failed to upload profile photo.']);
            }
        }

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'))->with('success', 'Registration successful!');
    }
}
