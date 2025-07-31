<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Login | Likho</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- Header -->
@include('components.header')
<!-- Login Content -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 80px); background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed; background-size: cover;">
    <div class="row shadow-lg" style="max-width: 900px; width: 100%; border-radius: 15px; background-color: rgba(255, 255, 255, 0.8);">
        <!-- Left Column with Logo and Description -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-light p-4">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="img-fluid mb-4" style="max-width: 150px;">
            <h3 class="mb-3">Welcome to Likho</h3>
            <p class="text-center">We provide the best services to help you achieve your goals. Join us today and be a part of our community.</p>
        </div>
        <!-- Right Column with Login Form -->
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4">
            <div class="text-center mb-4">
                <h2 class="card-title" style="font-size: 2em; font-weight: bold;">Login</h2>
            </div>
            <div class="text-center">
                <form method="POST" action="{{ route('login') }}" style="width: 100%; max-width: 400px;">
                    @csrf
                    <!-- Username Field -->
                    <div class="form-group mb-3">
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username*" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <!-- Password Field -->
                    <div class="form-group mb-3">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <!-- Remember Me -->
                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block" style="transition: transform 0.2s; width: 100%;">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </div>
                    <div class="mt-3">
                        <span>Don't have an account? <a href="{{ route('register') }}" class="btn btn-outline-primary btn-block" style="transition: transform 0.2s; width: 100%;">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('components.footer')

<!-- JS Plugins -->
<script src="{{ asset('plugins/jquery/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
