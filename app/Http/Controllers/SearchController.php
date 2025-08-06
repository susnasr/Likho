<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $posts = collect();

        if ($query) {
            $posts = Post::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->with(['user'])
                ->get();
            Log::info('Search query: ' . $query);
            Log::info('Posts found: ' . $posts->count());
            Log::info('Posts data: ' . json_encode($posts->map(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'class' => get_class($post),
                        'has_id' => is_null($post->id) ? 'No' : 'Yes',
                        'user_id' => $post->user_id,
                        'has_user' => is_null($post->user) ? 'No' : 'Yes',
                    ];
                })));
        }

        return view('search', compact('posts', 'query'));
    }
}
