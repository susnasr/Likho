<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Likho | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Laravel">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
</head>
<body style="padding-top: 60px;">
@include('components.header')

<!-- Register Section -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row shadow-lg" style="max-width: 900px; width: 100%; border-radius: 15px; overflow: hidden;">
        <!-- Left Column with Logo and Description -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-light p-4">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="img-fluid mb-4" style="max-width: 150px;">
            <h3 class="mb-3">Welcome to Likho</h3>
            <p class="text-center">We provide the best services to help you achieve your goals. Join us today and be a part of our community.</p>
        </div>
        <!-- Right Column with Register Form -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5">
            <div class="text-center mb-2">
                <h2 class="card-title" style="font-size: 1.5em; font-weight: bold;">Register</h2>
            </div>
            <div class="text-center">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" style="width: 100%; max-width: 300px;">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name*" required autofocus style="font-size: 0.9em; padding: 0.5em;">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email*" required style="font-size: 0.9em; padding: 0.5em;">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" required style="font-size: 0.9em; padding: 0.5em;">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password*" required style="font-size: 0.9em; padding: 0.5em;">
                    </div>

                    <div class="form-group mb-2">
                        <input type="tel" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" placeholder="Phone Number*" required style="font-size: 0.9em; padding: 0.5em;">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Bio*" required style="font-size: 0.9em; padding: 0.5em; height: 50px;">{{ old('bio') }}</textarea>
                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <textarea name="location" id="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location*" required style="font-size: 0.9em; padding: 0.5em; height: 50px;">{{ old('location') }}</textarea>
                        @error('location')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="profile_photo" class="form-label" style="font-size: 0.9em;">Profile Photo</label>
                        <input type="file" name="profile_photo" id="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" style="font-size: 0.9em; padding: 0.5em;">
                        @error('profile_photo')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-block" style="font-size: 0.9em; padding: 0.5em;">Register</button>
                    </div>
                    <div class="mt-2">
                        <span style="font-size: 0.9em;">Already have an account? <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block" style="font-size: 0.9em; padding: 0.5em;">Login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
</body>
</html>
