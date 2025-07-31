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
use Illuminate\Support\Facades\Storage;
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string', 'max:20'],
            'location' => ['required', 'string', 'max:25'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'profile_photo' => ['nullable', 'file'], // Allow any file type
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'bio' => $request->bio,
        ];

        if ($request->hasFile('profile_photo')) {
            try {
                $file = $request->file('profile_photo');
                // Optional: Set a higher max size (e.g., 10MB) for high-resolution images
                $maxSize = 10240; // 10MB in KB
                if ($file->getSize() / 1024 > $maxSize) {
                    return redirect()->back()->withErrors(['profile_photo' => 'File size must be less than 10MB.']);
                }
                $path = $file->store('profile_images', 'public');
                \Log::info('Profile photo stored at: ' . $path);
                $userData['profile_photo'] = $path; // Use 'profile_photo' to match the database column
            } catch (\Exception $e) {
                \Log::error('Profile photo upload failed: ' . $e->getMessage());
                return redirect()->back()->withErrors(['profile_photo' => 'Failed to upload profile photo: ' . $e->getMessage()]);
            }
        } else {
            \Log::info('No profile photo uploaded');
        }

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'))->with('success', 'Registration successful!');
    }
}
