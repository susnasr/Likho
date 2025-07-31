<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Likho | For the sus</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

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

<!-- start of banner -->
<div class="banner text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <h1 class="mb-2">
                    @if (Auth::check())
                        Hello, <span style="color: #18a23f; background-image: linear-gradient(to right, #18a23f, #64c87f); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ Auth::user()->name }}!
                        </span>
                    @else
                        Hello, there!
                    @endif
                </h1>
                <h1 class="mb-5">What Would You Like To Read Today?</h1>
                <ul class="list-inline widget-list-inline">
                    <li class="list-inline-item"><a href="tags.html">City</a></li>
                    <li class="list-inline-item"><a href="tags.html">Color</a></li>
                    <li class="list-inline-item"><a href="tags.html">Creative</a></li>
                    <li class="list-inline-item"><a href="tags.html">Decorate</a></li>
                    <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                    <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                    <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                    <li class="list-inline-item"><a href="tags.html">Food</a></li>
                    <li class="list-inline-item"><a href="tags.html">Nice</a></li>
                    <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                    <li class="list-inline-item"><a href="tags.html">Season</a></li>
                    <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                    <li class="list-inline-item"><a href="tags.html">Tasty</a></li>
                    <li class="list-inline-item"><a href="tags.html">Vlog</a></li>
                    <li class="list-inline-item"><a href="tags.html">Wow</a></li>
                </ul>
            </div>
        </div>
    </div>

    <svg class="banner-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306" stroke-miterlimit="10" />
        <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
        <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306" stroke-miterlimit="10" />
    </svg>

    <svg class="banner-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
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

    <svg class="banner-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306" stroke-miterlimit="10" />
        <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
        <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306" stroke-miterlimit="10" />
    </svg>

    <svg class="banner-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1" stroke-width="2" />
    </svg>
</div>
<!-- end of banner -->

<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Editor's Pick</h2>
                @if ($editorsPick)
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{ $editorsPick->image_url ?? asset('default-image.png') }}" class="card-img-top" alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('posts.show', $editorsPick->id) }}">{{ $editorsPick->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ route('author.show', $editorsPick->user->id) }}" class="card-meta-author">
                                        <img src="{{ $editorsPick->user->profile_image ? Storage::url($editorsPick->user->profile_image) : asset('default-avatar.png') }}" alt="User profile image">
                                        <span>{{ $editorsPick->user->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i> {{ $editorsPick->formatted_read_time }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i> {{ $editorsPick->created_at->format('d M, Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach (explode(',', $editorsPick->tags) as $tag)
                                            <li class="list-inline-item"><a href="#">{{ trim($tag) }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ Str::limit($editorsPick->content, 150) }}</p>
                            <a href="{{ route('posts.show', $editorsPick->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                @else
                    <p>No editor's pick available.</p>
                @endif
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Trending Posts</h2>
                @foreach ($trendingPosts as $post)
                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="{{ $post->image_url ?? asset('default-image.png') }}">
                            <div class="ml-3">
                                <h4><a href="{{ route('posts.show', $post->id) }}" class="post-title">{{ $post->title }}</a></h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i> {{ $post->created_at->format('d M, Y') }}
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i> {{ $post->formatted_read_time }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                @endforeach
                @if ($trendingPosts->isEmpty())
                    <p>No trending posts available.</p>
                @endif
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Popular Posts</h2>
                @foreach ($popularPosts as $post)
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{ $post->image_url ?? asset('default-image.png') }}" class="card-img-top" alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
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
                                        @foreach (explode(',', $post->tags) as $tag)
                                            <li class="list-inline-item"><a href="#">{{ trim($tag) }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ Str::limit($post->content, 150) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                @endforeach
                @if ($popularPosts->isEmpty())
                    <p>No popular posts available.</p>
                @endif
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Posts section remains static for now; update if needed -->
<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Posts</h2>
                @foreach ($recentPosts as $post)
                    <article class="card mb-4">
                        <div class="post-slider">
                            <img src="{{ $post->image_url ?? asset('default-image.png') }}" class="card-img-top" alt="post-thumb">
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
                                        @foreach (explode(',', $post->tags) as $tag)
                                            <li class="list-inline-item"><a href="#">{{ trim($tag) }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ Str::limit($post->content, 150) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                @endforeach
                @if ($recentPosts->isEmpty())
                    <p>No recent posts available.</p>
                @endif
            </div>
            <aside class="col-lg-4 sidebar-home">
                <!-- Search -->
                <div class="widget">
                    <h4 class="widget-title"><span>Search</span></h4>
                    <form action="{{ route('search') }}" class="widget-search" method="GET">
                        <input class="mb-3" id="search-query" name="s" type="search" placeholder="Type & Hit Enter...">
                        <i class="ti-search"></i>
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </form>
                </div>

                <!-- about me -->
                <div class="widget widget-about">
                    <h4 class="widget-title">Hi, I am Alex!</h4>
                    <img class="img-fluid" src="{{ asset('images/author.jpg') }}" alt="Themefisher">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel in in donec iaculis tempus odio nunc laoreet . Libero ullamcorper.</p>
                    <ul class="list-inline social-icons mb-3">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                    </ul>
                </div>

                <!-- Promotion -->
                <div class="promotion">
                    <img src="{{ asset('images/promotion.jpg') }}" class="img-fluid w-100">
                    <div class="promotion-content">
                        <h5 class="text-white mb-3">Create Stunning Website!!</h5>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur sociis. Etiam nunc amet id dignissim. Feugiat id tempor vel sit ornare turpis posuere.</p>
                        <a href="https://themefisher.com/" class="btn btn-primary">Get Started</a>
                    </div>
                </div>

                <div class="widget widget-author d-flex flex-column align-items-start">
                    <h4 class="widget-title">Authors</h4>

                    @foreach ($authors as $author)
                        <div class="media align-items-center">
                            <img class="widget-author-image mr-3" src="{{ $author->profile_photo_url }}" alt="{{ $author->name }}">
                            <div class="media-body">
                                <h5 class="mb-1">
                                    <a class="post-title" href="{{ route('author.show', $author->name) }}">{{ $author->name }}</a>
                                </h5>
                                <span>{{ Str::limit($author->bio ?: 'No bio available...', 20) }}</span> <br>
                                <i class="fa fa-map-marker mr-2"></i><span>{{ $author->location ?? 'Not specified' }}</span>
                            </div>
                        </div>
                    @endforeach
                    @if ($authors->isEmpty())
                        <p>No authors available.</p>
                    @endif
                </div>

                <div class="widget">
                    <h4 class="widget-title"><span>Never Miss A News</span></h4>
                    <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank" class="widget-search">
                        <input class="mb-3" id="search-query" name="s" type="search" placeholder="Your Email Address">
                        <i class="ti-email"></i>
                        <button type="submit" class="btn btn-primary btn-block" name="subscribe">Subscribe now</button>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                        </div>
                    </form>
                </div>

                <!-- categories -->
                <div class="widget widget-categories">
                    <h4 class="widget-title"><span>Categories</span></h4>
                    <ul class="list-unstyled widget-list">
                        <li><a href="tags.html" class="d-flex">Creativity <small class="ml-auto">(4)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Demo <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Elements <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Food <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Microwave <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Natural <small class="ml-auto">(3)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Newyork city <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Nice <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Tech <small class="ml-auto">(2)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Videography <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Vlog <small class="ml-auto">(1)</small></a></li>
                        <li><a href="tags.html" class="d-flex">Wondarland <small class="ml-auto">(1)</small></a></li>
                    </ul>
                </div>
                <!-- tags -->
                <div class="widget">
                    <h4 class="widget-title"><span>Tags</span></h4>
                    <ul class="list-inline widget-list-inline widget-card">
                        <li class="list-inline-item"><a href="tags.html">City</a></li>
                        <li class="list-inline-item"><a href="tags.html">Color</a></li>
                        <li class="list-inline-item"><a href="tags.html">Creative</a></li>
                        <li class="list-inline-item"><a href="tags.html">Decorate</a></li>
                        <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                        <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                        <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                        <li class="list-inline-item"><a href="tags.html">Food</a></li>
                        <li class="list-inline-item"><a href="tags.html">Nice</a></li>
                        <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                        <li class="list-inline-item"><a href="tags.html">Season</a></li>
                        <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                        <li class="list-inline-item"><a href="tags.html">Tasty</a></li>
                        <li class="list-inline-item"><a href="tags.html">Vlog</a></li>
                        <li class="list-inline-item"><a href="tags.html">Wow</a></li>
                    </ul>
                </div>
                <!-- recent post -->
                <div class="widget">
                    <h4 class="widget-title">Recent Posts</h4>
                    @foreach ($recentPosts->take(3) as $post)
                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm" src="{{ $post->image_url ?? asset('default-image.png') }}">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i> {{ $post->created_at->format('d M, Y') }}
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-timer"></i> {{ $post->formatted_read_time }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    @if ($recentPosts->isEmpty())
                        <p>No recent posts available.</p>
                    @endif
                </div>

                <!-- Social -->
                <div class="widget">
                    <h4 class="widget-title"><span>Social Links</span></h4>
                    <ul class="list-inline widget-social">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                    </ul>
                </div>
            </aside>
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
