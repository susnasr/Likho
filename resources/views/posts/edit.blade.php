<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Likho | Edit Post</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Edit your profile details">
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

    <meta property="og:title" content="Likho | Edit Profile" />
    <meta property="og:description" content="Edit your profile details" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>

<body>
@include('components.header')

<div class="py-4"></div>
<section class="section">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; background: url('{{ asset('website/fimages/background.jpg') }}') no-repeat center center fixed; background-size: cover;">
        <div class="row shadow-lg" style="max-width: 900px; width: 100%; border-radius: 15px; overflow: hidden; backdrop-filter: blur(10px);">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/reader-logo.png') }}" alt="Reader Logo" style="max-height: 50px; margin-bottom: 10px;">
                    <h2>Edit Post</h2>
                    <p>Update your existing post</p>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-light p-4">
                <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        @if($post->image_url)
                            <div class="mt-2"><img src="{{ $post->image_url }}" alt="Current Image" style="max-width: 150px;"></div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags (comma-separated)</label>
                        <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags', $post->tags) }}" placeholder="e.g., tech, lifestyle, coding">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
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
