<!DOCTYPE html>
<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Likho | Profile</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>
<!-- navigation -->
@include('components.header')

<!-- /navigation -->

<div class="author">
    <div class="container">
        <div class="row no-gutters justify-content-center">
            <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                <img class="author-image" src="{{ Auth::user()->profile_photo_url }}" alt="Profile Image" onerror="this.src='{{ asset('images/default-avatar.png') }}';">
            </div>
            <div class="col-md-8 col-lg-6 text-center text-md-left">
                <h2 class="mb-2">{{ Auth::user()->name }}</h2>
                <strong class="mb-2 d-block">{{ Auth::user()->email }}</strong>
                <p>Welcome to your profile page, {{ Auth::user()->name }}!</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary mt-3">Edit Profile</a>
            </div>

            <div class="col-md-8 col-lg-6 text-center text-md-left">
                <ul class="list-inline social-icons">
                    @if (Auth::user()->facebook_url)
                        <li class="list-inline-item"><a href="{{ Auth::user()->facebook_url }}" target="_blank"><i class="ti-facebook"></i></a></li>
                    @endif
                    @if (Auth::user()->twitter_url)
                        <li class="list-inline-item"><a href="{{ Auth::user()->twitter_url }}" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                    @endif
                    @if (Auth::user()->github_url)
                        <li class="list-inline-item"><a href="{{ Auth::user()->github_url }}" target="_blank"><i class="ti-github"></i></a></li>
                    @endif
                    @if (Auth::user()->linkedin_url)
                        <li class="list-inline-item"><a href="{{ Auth::user()->linkedin_url }}" target="_blank"><i class="ti-linkedin"></i></a></li>
                    @endif
                </ul>
                @php
                    $postCount = Auth::check() ? Auth::user()->posts()->count() : 0;
                @endphp
                @if (Auth::check() && $postCount == 0)
                    <p class="mb-1 ml-2">You don't have any posts yet.</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mt-2">Create Your First Blog</a>
                @else
                    <a class="post-count mb-1" href="author-single.html#post"><i class="ti-pencil-alt mr-2"></i><span class="text-primary">{{ $postCount }}</span> Posts by this author</a>
                @endif
            </div>
        </div>
    </div>

    <svg class="author-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306" stroke-miterlimit="10" />
        <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
        <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306" stroke-miterlimit="10" />
    </svg>

    <svg class="author-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d)">
            <path class="path" d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
            <path d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z" stroke="#040306" stroke-miterlimit="10" />
        </g>
        <defs>
            <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                <feOffset dy="4" />
                <feGaussianBlur stdDeviation="2" />
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
            </filter>
        </defs>
    </svg>

    <svg class="author-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306" stroke-miterlimit="10" />
        <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
        <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306" stroke-miterlimit="10" />
    </svg>

    <svg class="author-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1" stroke-width="2" />
    </svg>
</div>

<section class="section-sm" id="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @php
                    $posts = Auth::check() ? Auth::user()->posts : [];
                @endphp
                @if (Auth::check() && empty($posts))
                    <div class="text-center">
                        <p class="mb-4">You don't have any posts yet.</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Your First Blog</a>
                    </div>
                @elseif (Auth::check())
                    @foreach ($posts as $post)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{ $post->image_url ?? asset('images/default-post.jpg') }}" class="card-img-top" alt="post-thumb">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route('author.show', $post->user->id) }}" class="card-meta-author">
                                            <img src="{{ $post->user->profile_image ? Storage::url($post->user->profile_image) : asset('default-avatar.png') }}" alt="User profile image">
                                            <span>{{ $post->user->name }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i> {{ $post->formatted_read_time }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i> {{ $post->created_at->format('d M, Y') }}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            @foreach (explode(',', $post->tags ?? '') as $tag)
                                                <li class="list-inline-item"><a href="tags.html">{{ trim($tag) }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <p>{{ $post->content }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Read More</a>
                            </div>
                            @if (Auth::check() && Auth::id() === $post->user_id)
                                <div class="mt-3 d-flex gap-2">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@include('components.footer')

<!-- JS Plugins -->
<script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
