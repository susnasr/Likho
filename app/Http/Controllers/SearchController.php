<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display search results based on the query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get the search query from the 'q' parameter
        $query = $request->input('q');
        $posts = collect(); // Empty collection by default

        if ($query) {
            // Fetch posts matching the query in title or content
            $posts = Post::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->with(['author', 'tags']) // Eager load relationships required by the view
                ->get();
        }

        // Return the search view with posts and query
        return view('search', compact('posts', 'query'));
    }
}
