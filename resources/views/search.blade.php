<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Likho | Search Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Search results page">
    <meta name="author" content="Themefisher">

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <meta property="og:title" content="Reader | Search Results" />
    <meta property="og:description" content="Search results page" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:updated_time" content="{{ now()->toRfc3339String() }}" />
</head>
<body>
<!-- navigation -->
@include('components.header')
<!-- /navigation -->

<div class="py-3"></div>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 mb-4">
                <h1 class="h2 mb-4">Search results for
                    <mark>{{ $query }}</mark>
                </h1>
            </div>
            <div class="col-lg-10">
                @forelse ($posts as $post)
                    <article class="card mb-4">
                        <div class="row card-body">
                            <!-- Debug: Output post and user details -->
                            @if (!empty($post->image_url))
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="post-slider slider-sm">
                                        <img src="{{ asset($post->image_url) }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                                    </div>
                                </div>
                            @endif
                            <div class="{{ !empty($post->image_url) ? 'col-md-8' : 'col-12' }}">
                                <h3 class="h4 mb-3">
                                    @if ($post->id)
                                        <a class="post-title" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                    @else
                                        <span class="post-title">{{ $post->title }} (Invalid ID)</span>
                                    @endif
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        @if ($post->user && $post->user->slug)
                                            <a href="{{ route('author.show', ['slug' => $post->user->slug]) }}" class="card-meta-author">
                                                <img src="{{ $post->user->profilePhotoUrl }}" class="card-img" alt="{{ $post->user->name }}">
                                                <span>{{ $post->user->name }}</span>
                                            </a>
                                        @else
                                            <span class="card-meta-author">No Author (User ID: {{ $post->user_id ?? 'N/A' }}, Slug: {{ $post->user->slug ?? 'N/A' }}, URL: {{ $post->user->profilePhotoUrl ?? 'N/A' }})</span>
                                        @endif
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{ $post->formatted_read_time ?? 'N/A' }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{ $post->created_at->format('d M, Y') ?? 'N/A' }}
                                    </li>
                                </ul>
                                <p>{{ Str::limit($post->content ?? 'No content', 150) }}</p>
                                @if ($post->id)
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Read More</a>
                                @else
                                    <span class="btn btn-outline-primary disabled">Read More (Invalid ID)</span>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-12">
                        <p>No results found for <mark>{{ $query }}</mark></p>
                    </div>
                @endforelse
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
