<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Likho | Posts Details</title>

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

<div class="py-4"></div>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 mb-5 mb-lg-0">
                <article>
                    <div class="post-slider mb-4">
                        <img src="{{ $post->image_url ?? asset('images/post/post-2.jpg') }}" class="card-img" alt="{{ $post->title }}">
                    </div>
                    <h1 class="h2">{{ $post->title }}</h1>
                    <ul class="card-meta my-3 list-inline">
                        <li class="list-inline-item">
                            <a href="{{ route('author.show', $post->user->id) }}" class="card-meta-author">
                                <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
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
                            @if (auth()->check())
                                <form action="{{ route('post.like', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="btn btn-outline-primary mb-2" type="submit">
                                        <i style="color: lightgreen;" class="far fa-heart"></i>
                                        <span class="total-likes" style="font-family: Arial, sans-serif; font-size: 10px; color: lightgreen;"></span>
                                        {{ $post->likes }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary mb-2">
                                    <i style="color: lightgreen;" class="far fa-heart"></i>
                                    <span class="total-likes" style="font-family: Arial, sans-serif; font-size: 10px; color: lightgreen;"></span>
                                    {{ $post->likes }}
                                </a>
                            @endif
                        </li>
                        <li class="list-inline-item">
                            <ul class="card-meta-tag list-inline">
                                @foreach (explode(',', $post->tags ?? '') as $tag)
                                    <li class="list-inline-item"><a href="#">{{ trim($tag) }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <div class="content">
                        <p>{{ $post->content }}</p>
                    </div>
                </article>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="mb-5 border-top mt-4 pt-5">
                    <h3 class="mb-4">Comments</h3>
                    @foreach ($post->comments ?? [] as $comment)
                        <div class="media d-block d-sm-flex mb-4 pb-4">
                            <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                                <img src="{{ $comment->user->profile_photo_url ?? asset('images/post/user-01.jpg') }}" class="mr-3 rounded-circle" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="h4 d-inline-block mb-3">{{ $comment->user->name ?? 'Anonymous' }}</a>
                                <p>{{ $comment->content }}</p>
                                <span class="text-black-800 mr-3 font-weight-600">{{ $comment->created_at->format('F d, Y at h:i a') }}</span>
                                <a class="text-primary font-weight-600" href="#">Reply</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <h3 class="mb-4">Leave a Reply</h3>
                    <form method="POST" action="{{ route('comments.store', $post->id) }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control shadow-none" name="content" rows="7" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Comment Now</button>
                    </form>
                </div>
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
