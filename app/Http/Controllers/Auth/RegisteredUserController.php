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
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string', 'max:20'],
            'location' => ['required', 'string', 'max:25'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Added mimes
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
                $path = $request->file('profile_photo')->store('profile_images', 'public');
                \Log::info('Profile image stored at: ' . $path);
                $userData['profile_image'] = $path;
            } catch (\Exception $e) {
                \Log::error('Profile image upload failed: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to upload profile photo: ' . $e->getMessage());
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
