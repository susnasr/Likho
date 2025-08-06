<!-- Icon Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1/themify-icons.css">
<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand order-1" href="{{ route('home') }}">
                <img class="img-fluid" width="100px" src="{{ asset('images/logo.png') }}" alt="Reader | Hugo Personal Blog Template">
            </a>
            <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">All Posts</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <form class="search-bar mr-2" method="GET" action="{{ route('search') }}">
                            <input id="search-query" name="search" type="search" placeholder="Type & Hit Enter..." value="{{ request()->query('search') }}">
                        </form>
                        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
                            <i class="ti-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>

            <div class="order-2 order-lg-3 d-flex align-items-center">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="User Profile Picture" class="rounded-circle mr-3" style="width: 2rem; height: 2rem; object-fit: cover;" onerror="this.src='{{ asset('images/default-avatar.png') }}';"> {{ Auth::user()->name }} <i class="ti-angle-down ml-1"></i>                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fa fa-user mr-2"></i> Profile
                                </a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-link btn-danger dropdown-item" style="border: none; background: none;">
                                        <i class="fa fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <div class="order-2 order-lg-3 d-flex align-items-center">
                                <i class="fa fa-user"></i><a class="nav-link" href="{{ route('login') }}">Login</a>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
