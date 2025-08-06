<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Likho | All Posts</title>

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
<!-- navigation -->
@include('components.header')
<!-- /navigation -->

<body>
<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mt-5 col-8 mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Posts</h2>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-6 col-sm-6">
                            <article class="card mb-4">
                                <img src="{{ $post->image_url ?? asset('default-image.png') }}" class="card-img-top" alt="post-thumb">
                                <div class="card-body">
                                    <h3 class="h4 mb-3">
                                        <a class="post-title" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ route('author.show', ['slug' => $post->user->slug]) }}" class="card-meta-author">
                                                <img src="{{ $post->user->profile_image ? Storage::url($post->user->profile_image) : asset('default-avatar.png') }}" alt="{{ $post->user->name }}">
                                                <span>{{ $post->user->name }}</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-timer"></i> {{ $post->formatted_read_time }}
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-calendar"></i> {{ $post->created_at->format('d, Y M') }}
                                        </li>
                                        <li class="list-inline-item">
                                            <ul class="card-meta-tag list-inline">
                                                @foreach (explode(',', $post->tags) as $tag)
                                                    <li class="list-inline-item"><a href="#">{{ trim($tag) }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>{{ Str::limit($post->content, 120) }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary">Read More</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                {{ $posts->links() }} <!-- Pagination -->
            </div>
        </div>
    </div>
</section>
</body>
@include('components.footer')

<!-- JS Plugins -->
<script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('js/script.js') }}"></script>
</html>
