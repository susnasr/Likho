<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(): View
    {
        if (request()->route()->getName() === 'posts.index') {
            $posts = Post::with('user')->orderByDesc('created_at')->paginate(10);
            return view('posts.index', compact('posts'));
        }

        // Dynamic data for home page
        $recentPosts = Post::with('user')->orderByDesc('created_at')->take(6)->get();
        $editorsPick = Post::with('user')->inRandomOrder()->first();
        $trendingPosts = Post::with('user')->orderByDesc('views')->take(3)->get(); // Top 3 by views
        $popularPosts = Post::with('user')->orderByDesc('likes')->take(1)->get(); // Top 3 by likes
        $authors = User::has('posts')->get();
        if (auth()->check()) {
            $authors->prepend(auth()->user());
            $authors = $authors->unique('id');
        }

        return view('home', compact('recentPosts', 'editorsPick', 'trendingPosts', 'popularPosts', 'authors'));
    }

    public function show($id): View
    {
        $post = Post::with(['user', 'comments'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create(): View
    {
        \Log::info('Create page accessed', ['user' => auth()->id(), 'route' => request()->route()->uri()]);
        return view('posts.create');
    }

    public function store(Request $request)
    {
        \Log::info('Store method called', ['url' => $request->url(), 'method' => $request->method(), 'data' => $request->all()]);
        try {
            \Log::info('Validating request');
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required',
                'image' => 'nullable|image|max:2048',
                'tags' => 'nullable|string|max:255',
            ]);

            \Log::info('Preparing post data', $request->all());
            $postData = [
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'user_id' => auth()->id(),
                'views' => 0,
                'likes' => 0,
                'tags' => $request->input('tags'),
            ];

            // Use model method with request content
            $post = new Post($postData); // Create instance with request data
            $postData['read_time'] = $post->calculateReadTime();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/posts', 'public');
                $postData['image_url'] = '/storage/' . $imagePath;
            }

            \Log::info('Creating post with read time', array_merge($postData, ['read_time' => $postData['read_time']]));
            $post = Post::create($postData);

            \Log::info('Post created, preparing redirect', ['id' => $post->id, 'route' => 'posts.show']);
            return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully.')
                ->with('post_id', $post->id);
        } catch (\Exception $e) {
            \Log::error('Error in store method', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withInput()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $post = Post::findOrFail($id);
        $post->comments()->create([
            'content' => $request->input('content'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Comment added.');
    }

    public function edit($id): View
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        \Log::info('Update method called', [
            'url' => $request->url(),
            'method' => $request->method(),
            'data' => $request->all(),
            'user_id' => auth()->id(),
            'post_id' => $id
        ]);

        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            \Log::info('Validating request');
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required',
                'image' => 'nullable|image|max:2048', // 2MB limit
                'tags' => 'nullable|string|max:255',
            ], [
                'image.image' => 'The uploaded file must be a valid image (e.g., JPEG, PNG).',
                'image.max' => 'The image must not exceed 2MB.',
            ]);

            \Log::info('Preparing post data', $validatedData);
            $postData = $request->only(['title', 'content', 'tags']);

            // Use model method with request content
            $post = new Post($postData); // Create instance with request data
            $postData['read_time'] = $post->calculateReadTime();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/posts', 'public');
                if ($imagePath) {
                    $postData['image_url'] = '/storage/' . $imagePath;
                } else {
                    \Log::warning('Image storage failed', ['file' => $request->file('image')->getClientOriginalName()]);
                    return redirect()->back()->withInput()->with('error', 'Failed to store the image. Please try again.');
                }
            }

            \Log::info('Updating post', $postData);
            $post->update($postData);
            \Log::info('Post updated successfully', ['id' => $post->id]);

            return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully.')
                ->with('post_id', $post->id);
        } catch (\ValidationException $e) {
            \Log::error('Validation failed in update method', ['errors' => $e->validator->errors()->all(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withInput()->withErrors($e->validator)->with('error', 'Validation failed. Please check the form.');
        } catch (\Exception $e) {
            \Log::error('Error in update method', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the post. Please try again.');
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();
        return redirect()->route('profile')->with('success', 'Post deleted successfully.');
    }

    public function like(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to like a post.');
        }

        $post = Post::findOrFail($id);
        $user = auth()->user();
        $sessionKey = "post_{$post->id}_liked_by_{$user->id}";

        \Log::info('Like action', [
            'post_id' => $id,
            'user_id' => $user->id,
            'session_key' => $sessionKey,
            'has_session' => Session::has($sessionKey),
            'current_likes' => $post->likes,
            'fresh_likes' => Post::find($id)->likes // Double-check fresh data
        ]);

        if (Session::has($sessionKey)) {
            $post->decrement('likes');
            Session::forget($sessionKey);
            \Log::info('Decremented likes', ['new_likes' => $post->fresh()->likes]);
        } else {
            $post->increment('likes');
            Session::put($sessionKey, true);
            \Log::info('Incremented likes', ['new_likes' => $post->fresh()->likes]);
        }

        return redirect()->back()->with('updated', time()); // Add cache-busting parameter
    }
}
